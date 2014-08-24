<?php
class ZeroMQComponent extends Component {

    private $context;

    public function send($data) {

        if(!$this->context) $this->context = new ZMQContext();

        $manager = new ZMQSocket($this->context, ZMQ::SOCKET_REQ);
        $manager->connect("tcp://localhost:5553");
        $manager->setSockOpt(ZMQ::SOCKOPT_LINGER, 0);
        
        $poll = new ZMQPoll();
        $poll->add($manager, ZMQ::POLL_IN);

        $manager->send($data);
        
        $readable = array();
        $writable = array();
        if($poll->poll($readable, $writable, 1000)) {
            $reply = $manager->recv();
            return ($reply=='OK');
        } else {
            return false;
        }
    }

}
