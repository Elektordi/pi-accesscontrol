<?php
App::uses('AppController', 'Controller');
/**
 * Doors Controller
 *
 * @property Door $Door
 */
class DoorsController extends AppController {

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
			throw new NotFoundException(__('Invalid door'));
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
				$this->Session->setFlash(__('The door has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The door could not be saved. Please, try again.'));
			}
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
		if (!$this->Door->exists($id)) {
			throw new NotFoundException(__('Invalid door'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Door->save($this->request->data)) {
				$this->Session->setFlash(__('The door has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The door could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Door.' . $this->Door->primaryKey => $id));
			$this->request->data = $this->Door->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Door->id = $id;
		if (!$this->Door->exists()) {
			throw new NotFoundException(__('Invalid door'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Door->delete()) {
			$this->Session->setFlash(__('Door deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Door was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
