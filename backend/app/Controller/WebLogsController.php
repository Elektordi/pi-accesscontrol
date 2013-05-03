<?php
App::uses('AppController', 'Controller');
/**
 * WebLogs Controller
 *
 * @property WebLog $WebLog
 */
class WebLogsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->WebLog->recursive = 0;
		$this->set('webLogs', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->WebLog->exists($id)) {
			throw new NotFoundException(__('Invalid web log'));
		}
		$options = array('conditions' => array('WebLog.' . $this->WebLog->primaryKey => $id));
		$this->set('webLog', $this->WebLog->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->WebLog->create();
			if ($this->WebLog->save($this->request->data)) {
				$this->Session->setFlash(__('The web log has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The web log could not be saved. Please, try again.'));
			}
		}
		$users = $this->WebLog->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->WebLog->exists($id)) {
			throw new NotFoundException(__('Invalid web log'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->WebLog->save($this->request->data)) {
				$this->Session->setFlash(__('The web log has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The web log could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('WebLog.' . $this->WebLog->primaryKey => $id));
			$this->request->data = $this->WebLog->find('first', $options);
		}
		$users = $this->WebLog->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->WebLog->id = $id;
		if (!$this->WebLog->exists()) {
			throw new NotFoundException(__('Invalid web log'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->WebLog->delete()) {
			$this->Session->setFlash(__('Web log deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Web log was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
