<?php
App::uses('AppController', 'Controller');
/**
 * Cards Controller
 *
 * @property Card $Card
 * @property PaginatorComponent $Paginator
 */
class CardsController extends AppController {

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
			throw new NotFoundException(__('Card invalide.'));
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
				$this->Session->setFlash(__('Card enregistré.'), 'flash/success');
				$this->redirect(array('action' => 'view', $this->Card->id));
			} else {
				$this->Session->setFlash(__('Card impossible à enregistrer. Réessayez ultérieurement.'), 'flash/error');
			}
		}
		$users = $this->Card->User->find('list');
		$this->set(compact('users'));
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
        $this->Card->id = $id;
		if (!$this->Card->exists($id)) {
			throw new NotFoundException(__('Card invalide.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Card->save($this->request->data)) {
				$this->Session->setFlash(__('Card sauvegardé.'), 'flash/success');
				$this->redirect(array('action' => 'view', $this->Card->id));
			} else {
				$this->Session->setFlash(__('Card impossible à enregistrer. Réessayez ultérieurement.'), 'flash/error');
			}
		}
		$options = array('conditions' => array('Card.' . $this->Card->primaryKey => $id));
		$this->request->data = $this->Card->find('first', $options);
        $this->set('card', $this->request->data);

		$users = $this->Card->User->find('list');
		$this->set(compact('users'));
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
		$this->Card->id = $id;
		if (!$this->Card->exists()) {
			throw new NotFoundException(__('Card invalide.'));
		}
		if ($this->Card->delete()) {
			$this->Session->setFlash(__('Card supprimé.'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Card impossible à supprimer.'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
