<?php
App::uses('AppController', 'Controller');
/**
 * Rights Controller
 *
 * @property Right $Right
 */
class RightsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Right->recursive = 0;
		$this->set('rights', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Right->exists($id)) {
			throw new NotFoundException(__('Invalid right'));
		}
		$options = array('conditions' => array('Right.' . $this->Right->primaryKey => $id));
		$this->set('right', $this->Right->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Right->create();
			if ($this->Right->save($this->request->data)) {
				$this->Session->setFlash(__('The right has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The right could not be saved. Please, try again.'));
			}
		}
		$groups = $this->Right->Group->find('list');
		$doors = $this->Right->Door->find('list');
		$this->set(compact('groups', 'doors'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Right->exists($id)) {
			throw new NotFoundException(__('Invalid right'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Right->save($this->request->data)) {
				$this->Session->setFlash(__('The right has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The right could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Right.' . $this->Right->primaryKey => $id));
			$this->request->data = $this->Right->find('first', $options);
		}
		$groups = $this->Right->Group->find('list');
		$doors = $this->Right->Door->find('list');
		$this->set(compact('groups', 'doors'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Right->id = $id;
		if (!$this->Right->exists()) {
			throw new NotFoundException(__('Invalid right'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Right->delete()) {
			$this->Session->setFlash(__('Right deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Right was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
