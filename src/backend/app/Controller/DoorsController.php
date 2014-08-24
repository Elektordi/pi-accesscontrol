<?php
App::uses('AppController', 'Controller');
/**
 * Doors Controller
 *
 * @property Door $Door
 * @property PaginatorComponent $Paginator
 */
class DoorsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'ZeroMQ');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Door->recursive = 0;
		$this->set('doors', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Door->exists($id)) {
			throw new NotFoundException(__('Door invalide.'));
		}
		$options = array('conditions' => array('Door.' . $this->Door->primaryKey => $id));
		$this->set('door', $this->Door->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Door->create();
			if ($this->Door->save($this->request->data)) {
				$this->Session->setFlash(__('Door enregistré.'), 'flash/success');
				$this->redirect(array('action' => 'view', $this->Door->id));
			} else {
				$this->Session->setFlash(__('Door impossible à enregistrer. Réessayez ultérieurement.'), 'flash/error');
			}
		}
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
        $this->Door->id = $id;
		if (!$this->Door->exists($id)) {
			throw new NotFoundException(__('Door invalide.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Door->save($this->request->data)) {
				$this->Session->setFlash(__('Door sauvegardé.'), 'flash/success');
				$this->redirect(array('action' => 'view', $this->Door->id));
			} else {
				$this->Session->setFlash(__('Door impossible à enregistrer. Réessayez ultérieurement.'), 'flash/error');
			}
		}
		$options = array('conditions' => array('Door.' . $this->Door->primaryKey => $id));
		$this->request->data = $this->Door->find('first', $options);
        $this->set('door', $this->request->data);

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
		$this->Door->id = $id;
		if (!$this->Door->exists()) {
			throw new NotFoundException(__('Door invalide.'));
		}
		if ($this->Door->delete()) {
			$this->Session->setFlash(__('Door supprimé.'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Door impossible à supprimer.'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
	
	// TEST GG
	public function doaction($id = null, $do = null) {
        $this->Door->id = $id;
		if (!$this->Door->exists($id)) {
			throw new NotFoundException(__('Door invalide.'));
		}
		if(!in_array($do, array('beep', 'lock', 'unlock'))) {
    		throw new NotFoundException(__('Action invalide.'));
		}
		
		$options = array('conditions' => array('Door.' . $this->Door->primaryKey => $id));
		$door = $this->Door->find('first', $options);
		
		if($this->ZeroMQ->send('DOOR:'.$id.':'.strtoupper($do))) {
			$this->Session->setFlash(__("Action $do envoyée à ".$door['Door']['name']), 'flash/success');
		} else {
			$this->Session->setFlash(__("Echec de l'envoi de $do à ".$door['Door']['name']), 'flash/error');
		}
		
		$this->redirect(array('action' => 'index'));
	}
}
