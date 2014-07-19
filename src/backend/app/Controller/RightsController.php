<?php
App::uses('AppController', 'Controller');
/**
 * Rights Controller
 *
 * @property Right $Right
 * @property PaginatorComponent $Paginator
 */
class RightsController extends AppController {

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
			throw new NotFoundException(__('Right invalide.'));
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
				$this->Session->setFlash(__('Right enregistré.'), 'flash/success');
				$this->redirect(array('action' => 'view', $this->Right->id));
			} else {
				$this->Session->setFlash(__('Right impossible à enregistrer. Réessayez ultérieurement.'), 'flash/error');
			}
		}
		$groups = $this->Right->Group->find('list');
		$doors = $this->Right->Door->find('list');
		$this->set(compact('groups', 'doors'));
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
        $this->Right->id = $id;
		if (!$this->Right->exists($id)) {
			throw new NotFoundException(__('Right invalide.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Right->save($this->request->data)) {
				$this->Session->setFlash(__('Right sauvegardé.'), 'flash/success');
				$this->redirect(array('action' => 'view', $this->Right->id));
			} else {
				$this->Session->setFlash(__('Right impossible à enregistrer. Réessayez ultérieurement.'), 'flash/error');
			}
		}
		$options = array('conditions' => array('Right.' . $this->Right->primaryKey => $id));
		$this->request->data = $this->Right->find('first', $options);
        $this->set('right', $this->request->data);

		$groups = $this->Right->Group->find('list');
		$doors = $this->Right->Door->find('list');
		$this->set(compact('groups', 'doors'));
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
		$this->Right->id = $id;
		if (!$this->Right->exists()) {
			throw new NotFoundException(__('Right invalide.'));
		}
		if ($this->Right->delete()) {
			$this->Session->setFlash(__('Right supprimé.'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Right impossible à supprimer.'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
