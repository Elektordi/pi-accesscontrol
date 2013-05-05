<?php
App::uses('AppController', 'Controller');
/**
 * Logs Controller
 *
 * @property Log $Log
 */
class LogsController extends AppController {

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
			throw new NotFoundException(__('Invalid log'));
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
				$this->Session->setFlash(__('The log has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The log could not be saved. Please, try again.'));
			}
		}
		$cards = $this->Log->Card->find('list');
		$doors = $this->Log->Door->find('list');
		$this->set(compact('cards', 'doors'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Log->exists($id)) {
			throw new NotFoundException(__('Invalid log'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Log->save($this->request->data)) {
				$this->Session->setFlash(__('The log has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The log could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Log.' . $this->Log->primaryKey => $id));
			$this->request->data = $this->Log->find('first', $options);
		}
		$cards = $this->Log->Card->find('list');
		$doors = $this->Log->Door->find('list');
		$this->set(compact('cards', 'doors'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Log->id = $id;
		if (!$this->Log->exists()) {
			throw new NotFoundException(__('Invalid log'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Log->delete()) {
			$this->Session->setFlash(__('Log deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Log was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
