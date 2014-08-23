#!/usr/bin/perl

use strict;
use warnings;

# If you don't have ZMQ3, run "cpan ZMQ::LibZMQ3"
use ZMQ::LibZMQ3;
use ZMQ::Constants qw(ZMQ_SUB ZMQ_SUBSCRIBE ZMQ_REQ);
use zhelpers;

print "**************************\n";
print "PI-AC: Security manager v1\n";
print "**************************\n";

my ($major, $minor, $patch) = ZMQ::LibZMQ3::zmq_version();
print ("Current 0MQ version is $major.$minor.$patch\n");

my $context = zmq_init();

my $zmq_events = zmq_socket($context, ZMQ_REP);
zmq_bind($zmq_events, 'tcp://*:5551');

my $zmq_controllers = zmq_socket($context, ZMQ_PUB);
zmq_bind($zmq_controllers, 'tcp://*:5552');

my $controllerid = 0;
print "Ready...\n";

while (1) {
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
        # TODO
        s_send($zmq_events, 'OK:ACK');
        if($d[3] eq '666') {
            print "Sending test commands...\n";
            s_send($zmq_controllers, "ALL:BEEP");
            s_send($zmq_controllers, "$id:LOCK");
        }
    } elsif($d[1] eq 'EVENT') {
        if($#d!=2) {
            print "Bad fields count $#d for EVENT...\n";    
            s_send($zmq_events, 'ERR:BADREQUEST');
            next;
        }
        # TODO
        s_send($zmq_events, 'OK');
    } elsif($d[1] eq 'ALIVE') {
        # TODO
        $controllerid++;
        s_send($zmq_events, "OK:5552:$controllerid");
    } else {
        print "Unknow OPCODE...\n";
        s_send($zmq_events, 'ERR:BADOPCODE');
    }
}

