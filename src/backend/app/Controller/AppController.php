<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $levels = array(
        1 => 'Lecture seule',
        5 => 'Accès simplifié',
        7 => 'Accès complet',
        9 => 'Super-administrateur'
    );
    
    public $sexes = array(
        '?' => 'Inconnu',
        'M' => 'Homme',
        'F' => 'Femme'
    );

    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => '/',
            'logoutRedirect' => '/',
            'unauthorizedRedirect' => '/',
            'authError' => 'Accès refusé.',
            'authorize' => array('Controller')
        ),
        'Cookie' => array(
            'httpOnly' => true
        )
    );
    
    public $uses = array('User');

    public function beforeFilter() {

	    $this->Cookie->key = Configure::read('Cookie.SecurityKey');

        if (!$this->Auth->loggedIn() && $this->Cookie->read('remember_me_cookie')) {
            $cookie = $this->Cookie->read('remember_me_cookie');

            $user = $this->User->find('first', array(
                'conditions' => array(
                    'User.username' => $cookie['username'],
                    'User.password' => $cookie['password']
                )
            ));

            if ($user) {
                if($this->Auth->login($user['User'])) {
                    $this->loginSuccessFlash("Reconnexion automatique");
                } else {
                    $this->redirect('/users/logout');
                }
            }
        }
    
        $this->Auth->allow('users', 'login');
        $this->Auth->allow('users', 'logout');
        //$this->set('authuser', $this->Auth->user);
    }
    
	
    public function beforeRender() {
        $this->set('sexes', $this->sexes);
        parent::beforeRender();
    }

    
    public function loginSuccessFlash($action = "Connexion") {
        $h = date('H');
        if($h>=0 && $h<4) {
            $prefix = "Bonsoir";
            $suffix = "Encore debout ?";
        } elseif ($h>=4 && $h<8) {
            $prefix = "Bonjour";
            $suffix = "Déjà debout ?";
        } elseif ($h>=8 && $h<12) {
            $prefix = "Bonjour";
            $suffix = "Passez une bonne journée...";
        } elseif ($h>=12 && $h<20) {
            $prefix = "Bonjour";
            $suffix = "Je peux vous aider ?";
        } elseif ($h>=20) {
            $prefix = "Bonsoir";
            $suffix = "Passez une bonne soirée...";
        }
        
        $this->Session->setFlash(__($action.' réussie. '.$prefix.' '.$this->Auth->user('name').' ! '.$suffix), 'flash/success');
    }
    
    public function isAuthorized($user) {
        if(empty($user) || empty($user['admin'])) return false;
        $level = $user['admin'];
        $this->set('user_level', $level);
        
        if ($level == 9) return true; // Admin
        $controller = $this->request->params['controller'];
        $action = $this->request->params['action'];
        
        if($controller=="users") return false; // Blacklisté pour les non admins

        if($level==1) { // Lecture seule
            if($action=="index" || $action=="view") return true;
            return false;
        }
        
        if($level==5) { // Simple
            if($action=="delete") return false;
            return true;
        }
        
        if($level==7) { // Complet
            return true;
        }

        return false;
    }
    
    public function addEmptyValue($array, $label='-')
    {
        // HACK : Normalement showEmpty de FormHelper est là pour ça, mais il est buggé.
        return array(''=>$label)+$array;
    }

}
