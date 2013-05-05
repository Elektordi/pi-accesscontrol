<?php
App::uses('AppController', 'Controller');
/**
 * Cards Controller
 *
 * @property Card $Card
 */
class CardsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Card->recursive = 0;
		$this->set('cards', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Card->exists($id)) {
			throw new NotFoundException(__('Invalid card'));
		}
		$options = array('conditions' => array('Card.' . $this->Card->primaryKey => $id));
		$this->set('card', $this->Card->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Card->create();
			if ($this->Card->save($this->request->data)) {
				$this->Session->setFlash(__('The card has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The card could not be saved. Please, try again.'));
			}
		}
		$users = $this->Card->User->find('list');
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
		if (!$this->Card->exists($id)) {
			throw new NotFoundException(__('Invalid card'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Card->save($this->request->data)) {
				$this->Session->setFlash(__('The card has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The card could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Card.' . $this->Card->primaryKey => $id));
			$this->request->data = $this->Card->find('first', $options);
		}
		$users = $this->Card->User->find('list');
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
		$this->Card->id = $id;
		if (!$this->Card->exists()) {
			throw new NotFoundException(__('Invalid card'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Card->delete()) {
			$this->Session->setFlash(__('Card deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Card was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
