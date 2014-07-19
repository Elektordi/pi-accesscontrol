<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('User invalide.'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('User enregistré.'), 'flash/success');
				$this->redirect(array('action' => 'view', $this->User->id));
			} else {
				$this->Session->setFlash(__('User impossible à enregistrer. Réessayez ultérieurement.'), 'flash/error');
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
		foreach($this->passedArgs as $k => $v) {
		    $this->set('default_'.$k, $v);
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->User->id = $id;
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('User invalide.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('User sauvegardé.'), 'flash/success');
				$this->redirect(array('action' => 'view', $this->User->id));
			} else {
				$this->Session->setFlash(__('User impossible à enregistrer. Réessayez ultérieurement.'), 'flash/error');
			}
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->request->data = $this->User->find('first', $options);
        $this->set('user', $this->request->data);

		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('User invalide.'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User supprimé.'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User impossible à supprimer.'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
	
    public function login() {
        if($this->Auth->loggedIn()) {
            $this->redirect('/'); // Évite la faille permettant de générer le cookie à postériori
        }
    
        $this->layout = 'guest';
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
            
                if (isset($this->request->data['remember_me'])) {
                    $this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['password']);
                    $this->Cookie->write('remember_me_cookie', $this->request->data['User'], true, '4 weeks');
                }
            
                $this->loginSuccessFlash();
                return $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('Identifiant ou mot de passe invalide, veuillez réessayer.'), 'flash/error');
            }
        }
    }

    public function logout() {
        $this->Session->setFlash(__('Vous avez été déconnecté de l\'application... A bientôt !'), 'flash/success');
        $this->Cookie->delete('remember_me_cookie');
        return $this->redirect($this->Auth->logout());
    }
    
    public function profile() {
        $id = $this->Auth->user('id');
        return $this->redirect('edit/'.$id);
    }
}
