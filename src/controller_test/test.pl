#!/usr/bin/perl

use strict;
use warnings;
use threads;

# CONFIG

my $host = 'localhost';
my $managerport = 5551;

# If you don't have ZMQ3, run "cpan ZMQ::LibZMQ3"
use ZMQ::LibZMQ3;
use ZMQ::Constants qw(ZMQ_SUB ZMQ_SUBSCRIBE ZMQ_REQ ZMQ_NOBLOCK);

sub s_recv {
    my $buf;
    my $socket = shift;
    my $size = zmq_recv($socket, $buf, 255);
    return undef if ($size < 0);
    return substr($buf, 0, $size);
}

sub s_try_recv {
    my $buf;
    my $socket = shift;
    my $size = zmq_recv($socket, $buf, 255, ZMQ_NOBLOCK);
    return undef if ($size < 0);
    return substr($buf, 0, $size);
}

sub get_commands {
    my $context = shift;
    my $host = shift;
    my $cmdport = shift;
    my $myid = shift;
    my $zmq_commands = zmq_socket($context, ZMQ_SUB);
    zmq_connect($zmq_commands, "tcp://$host:$cmdport");
    zmq_setsockopt($zmq_commands, ZMQ_SUBSCRIBE, '');    
    while(1) {
        my $command = s_recv($zmq_commands);
        if($command) {
            print "Got command from manager: $command\n";
            my @c = split(/:+/, $command);
            if($c[0] eq 'ALL' || $c[0] eq $myid) {
                print "Command is for me.\n";
            } else {
                print "Command is not for me.\n";
            }
        }
    }
}

print "*************************\n";
print "PI-AC: Test Controller v1\n";
print "*************************\n";

my ($major, $minor, $patch) = ZMQ::LibZMQ3::zmq_version();
print ("Current 0MQ version is $major.$minor.$patch\n");

my $context = zmq_init();

my $zmq_events = zmq_socket($context, ZMQ_REQ);
zmq_connect($zmq_events, "tcp://$host:$managerport");

my $msg = "00000DUMMYSN00000:ALIVE";
print "Sending init \"$msg\"... ";
zmq_send($zmq_events, $msg, -1);
print "   [OK]\n";
my $data = s_recv($zmq_events);
print "Recevied conf: $data\n";
my @conf = split(/:+/, $data);

if($conf[0] ne 'OK') {
    print "Init failed $data\n";
    exit;
}
my $cmdport = $conf[1];
my $myid = $conf[2];

my $thread_commands = threads->new(\&get_commands, $context, $host, $cmdport, $myid);

print "Controller #$myid ready...\n";
while(1) {
    print ">";
    my $id = <>;
    chop $id;
    if ($id eq '') {
        $msg = "$myid:EVENT:EXIT";
    } else {
        $msg = "$myid:READ:TEST:$id";
    }
    print "Sending \"$msg\"... ";
    zmq_send($zmq_events, $msg, -1);
    print "   [OK]\n";
    my $data = s_recv($zmq_events);
    print "Recevied: $data\n";
}


