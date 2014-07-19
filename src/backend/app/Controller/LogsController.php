<?php
App::uses('AppController', 'Controller');
/**
 * Logs Controller
 *
 * @property Log $Log
 * @property PaginatorComponent $Paginator
 */
class LogsController extends AppController {

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
		$this->Log->recursive = 0;
		$this->set('logs', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Log->exists($id)) {
			throw new NotFoundException(__('Log invalide.'));
		}
		$options = array('conditions' => array('Log.' . $this->Log->primaryKey => $id));
		$this->set('log', $this->Log->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Log->create();
			if ($this->Log->save($this->request->data)) {
				$this->Session->setFlash(__('Log enregistré.'), 'flash/success');
				$this->redirect(array('action' => 'view', $this->Log->id));
			} else {
				$this->Session->setFlash(__('Log impossible à enregistrer. Réessayez ultérieurement.'), 'flash/error');
			}
		}
		$cards = $this->Log->Card->find('list');
		$doors = $this->Log->Door->find('list');
		$this->set(compact('cards', 'doors'));
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
        $this->Log->id = $id;
		if (!$this->Log->exists($id)) {
			throw new NotFoundException(__('Log invalide.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Log->save($this->request->data)) {
				$this->Session->setFlash(__('Log sauvegardé.'), 'flash/success');
				$this->redirect(array('action' => 'view', $this->Log->id));
			} else {
				$this->Session->setFlash(__('Log impossible à enregistrer. Réessayez ultérieurement.'), 'flash/error');
			}
		}
		$options = array('conditions' => array('Log.' . $this->Log->primaryKey => $id));
		$this->request->data = $this->Log->find('first', $options);
        $this->set('log', $this->request->data);

		$cards = $this->Log->Card->find('list');
		$doors = $this->Log->Door->find('list');
		$this->set(compact('cards', 'doors'));
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
		$this->Log->id = $id;
		if (!$this->Log->exists()) {
			throw new NotFoundException(__('Log invalide.'));
		}
		if ($this->Log->delete()) {
			$this->Session->setFlash(__('Log supprimé.'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Log impossible à supprimer.'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
