<?php

class AdminShell extends AppShell {
    public $uses = array('User');
    
    public function main() {
        // HACK: A refaire avec le parser cakephp
        echo "PI-AC Users manager\n\n";
        echo "\tUsage:\n";
        echo "cake admin show <username>\n";
        echo "cake admin passwd <username> <password>\n";
    }
    
    public function show() {
        if(empty($this->args[0])) {
             $this->error("Missing parameters. Usage: cake admin show <username>\n");
            return;
        }
        $user = $this->User->findByUsername($this->args[0]);
        $this->out(print_r($user, true));
    }
    
    public function passwd() {
        if(empty($this->args[0]) || empty($this->args[1])) {
            $this->error("Missing parameters. Usage: cake admin passwd <username> <password>\n");
            return;
        }
        $user1 = $this->User->findByUsername($this->args[0]);
        $this->User->id = $user1['User']['id'];
        $this->User->saveField('password', $this->args[1]);
        $user2 = $this->User->findByUsername($this->args[0]);
        $this->out("Password updated for user ".$this->args[0].":\nWas ".$user1['User']['password']." and is now ".$user2['User']['password'].".", 1, Shell::NORMAL);
    }
}
