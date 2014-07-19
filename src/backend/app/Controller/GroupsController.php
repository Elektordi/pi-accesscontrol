<?php
App::uses('AppController', 'Controller');
/**
 * Groups Controller
 *
 * @property Group $Group
 * @property PaginatorComponent $Paginator
 */
class GroupsController extends AppController {

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
		$this->Group->recursive = 0;
		$this->set('groups', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Group->exists($id)) {
			throw new NotFoundException(__('Group invalide.'));
		}
		$options = array('conditions' => array('Group.' . $this->Group->primaryKey => $id));
		$this->set('group', $this->Group->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Group->create();
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('Group enregistré.'), 'flash/success');
				$this->redirect(array('action' => 'view', $this->Group->id));
			} else {
				$this->Session->setFlash(__('Group impossible à enregistrer. Réessayez ultérieurement.'), 'flash/error');
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
        $this->Group->id = $id;
		if (!$this->Group->exists($id)) {
			throw new NotFoundException(__('Group invalide.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('Group sauvegardé.'), 'flash/success');
				$this->redirect(array('action' => 'view', $this->Group->id));
			} else {
				$this->Session->setFlash(__('Group impossible à enregistrer. Réessayez ultérieurement.'), 'flash/error');
			}
		}
		$options = array('conditions' => array('Group.' . $this->Group->primaryKey => $id));
		$this->request->data = $this->Group->find('first', $options);
        $this->set('group', $this->request->data);

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
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Group invalide.'));
		}
		if ($this->Group->delete()) {
			$this->Session->setFlash(__('Group supprimé.'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Group impossible à supprimer.'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
