#!/usr/bin/perl

use strict;
use warnings;
use threads;

use DBI;

# If you don't have ZMQ3, run "cpan ZMQ::LibZMQ3"
use ZMQ::LibZMQ3;
use ZMQ::Constants qw(ZMQ_SUB ZMQ_SUBSCRIBE ZMQ_REQ);
use zhelpers;

print "**************************\n";
print "PI-AC: Security manager v1\n";
print "**************************\n";

my $dbh = DBI->connect("dbi:mysql:database=accesscontrol;host=localhost", "root", "gg", {'RaiseError' => 1});
print "DB driver ".$dbh->get_info(17)." version ".$dbh->get_info(18)."\n";

my ($major, $minor, $patch) = ZMQ::LibZMQ3::zmq_version();
print ("0MQ version $major.$minor.$patch\n");

my $context = zmq_init();

my $zmq_events = zmq_socket($context, ZMQ_REP);
zmq_bind($zmq_events, 'tcp://*:5551');

my $zmq_controllers = zmq_socket($context, ZMQ_PUB);
zmq_bind($zmq_controllers, 'tcp://*:5552');

my $zmq_admin = zmq_socket($context, ZMQ_REP);
zmq_bind($zmq_admin, 'tcp://*:5553');

my $controllerid = 0;
print "Ready...\n";

while (1) {

    zmq_poll([
        {
            socket => $zmq_events,
            events => ZMQ_POLLIN,
            callback => sub {

                my $data = s_recv($zmq_events);
                print "Recevied: $data\n";
                
                my @d = split(/:+/, $data);
                
                if($#d<1) {
                    print "Bad fields count $#d...\n";    
                    s_send($zmq_events, 'ERR:BADREQUEST');
                    next;
                }
                
                my $id = $d[0];
                
                if($d[1] eq 'READ') {
                    if($#d!=3) {
                        print "Bad fields count $#d for READ...\n";    
                        s_send($zmq_events, 'ERR:BADREQUEST');
                        next;
                    }

                    my $prep = $dbh->prepare('SELECT c.id, c.blocked, r.id FROM cards c JOIN users u ON u.id = c.user_id LEFT JOIN rights r ON r.group_id = u.group_id AND r.door_id=? WHERE c.uid LIKE ?'); 
                    $prep->execute($d[0], $d[3]); # TODO: tech
                    my @card = $prep->fetchrow_array;
                    if(@card) {
                        if($card[1]) {
                            $dbh->do("INSERT INTO logs(timestamp, action, card_id, door_id, result, data) VALUES (NOW(), 'READ', ?, ?, 'BLOCKED', ?);", undef, $card[0], $d[0], $d[3]);
                            s_send($zmq_events, 'OK:BLOCKED');
                            print "Blocked card $d[3] used on door #$d[0]...\n";
                        } elsif($card[2]) {
                            $dbh->do("INSERT INTO logs(timestamp, action, card_id, door_id, result, data) VALUES (NOW(), 'READ', ?, ?, 'ACK', ?);", undef, $card[0], $d[0], $d[3]);
                            s_send($zmq_events, 'OK:ACK');
                            print "Access granted for $d[3] on door #$d[0]...\n";
                        } else {
                            $dbh->do("INSERT INTO logs(timestamp, action, card_id, door_id, result, data) VALUES (NOW(), 'READ', ?, ?, 'NAK', ?);", undef, $card[0], $d[0], $d[3]);
                            s_send($zmq_events, 'OK:NAK');
                            print "Access denied for $d[3] on door #$d[0]...\n";
                        }
                    } else {
                        $dbh->do("INSERT INTO logs(timestamp, action, card_id, door_id, result, data) VALUES (NOW(), 'READ', NULL, ?, 'NAK', ?);", undef, $d[0], $d[3]);
                        s_send($zmq_events, 'OK:NAK');
                        print "Unknow card $d[3]...\n";
                    }
                    
                } elsif($d[1] eq 'EVENT') {
                    if($#d!=2) {
                        print "Bad fields count $#d for EVENT...\n";    
                        s_send($zmq_events, 'ERR:BADREQUEST');
                        next;
                    }
                    
                    $dbh->do("INSERT INTO logs(timestamp, action, door_id, data) VALUES (NOW(), 'EVENT', ?, ?);", undef, $d[0], $d[2]);
                    
                    s_send($zmq_events, 'OK');
                } elsif($d[1] eq 'ALIVE') {
                    
                    my $prep = $dbh->prepare('SELECT id FROM doors WHERE serial LIKE ?;'); 
                    $prep->execute($d[0]);
                    my @door = $prep->fetchrow_array;
                    if(@door) {
                        $dbh->do("UPDATE doors SET lastseen=NOW() WHERE id = ?;", undef, $door[0]);
                        s_send($zmq_events, "OK:5552:".$door[0]); # TODO
                    } else {
                        s_send($zmq_events, "ERR:UNKNOWCONTROLLER");
                    }
                    $prep->finish(); 

                } else {
                    print "Unknow OPCODE...\n";
                    s_send($zmq_events, 'ERR:BADOPCODE');
                }

            }
        }, {
            socket => $zmq_admin,
            events => ZMQ_POLLIN,
            callback => sub {
            
                my $data = s_recv($zmq_admin);
                print "Recevied admin command: $data\n";
                
                my @d = split(/:+/, $data);
                
                if($d[0] eq 'PING') {
                    s_send($zmq_admin, 'OK:PONG');
                } elsif($d[0] eq 'DOOR') {
                    if($#d!=2) {
                        print "Bad fields count $#d for PING...\n";    
                        s_send($zmq_admin, 'ERR:BADREQUEST');
                        next;
                    }
                    s_send($zmq_controllers, $d[1].":".$d[2]);
                    s_send($zmq_admin, 'OK');
                } else {
                    print "Unknow OPCODE...\n";
                    s_send($zmq_admin, 'ERR:BADOPCODE');
                }
                
            }
        },
    ], -1); # timeout = -1 ms : endless wait
   
}

