<?php
App::uses('AppController', 'Controller');
/**
 * WebLogs Controller
 *
 * @property WebLog $WebLog
 * @property PaginatorComponent $Paginator
 */
class WebLogsController extends AppController {

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
			throw new NotFoundException(__('Web Log invalide.'));
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
				$this->Session->setFlash(__('Web Log enregistré.'), 'flash/success');
				$this->redirect(array('action' => 'view', $this->WebLog->id));
			} else {
				$this->Session->setFlash(__('Web Log impossible à enregistrer. Réessayez ultérieurement.'), 'flash/error');
			}
		}
		$users = $this->WebLog->User->find('list');
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
        $this->WebLog->id = $id;
		if (!$this->WebLog->exists($id)) {
			throw new NotFoundException(__('Web Log invalide.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->WebLog->save($this->request->data)) {
				$this->Session->setFlash(__('Web Log sauvegardé.'), 'flash/success');
				$this->redirect(array('action' => 'view', $this->WebLog->id));
			} else {
				$this->Session->setFlash(__('Web Log impossible à enregistrer. Réessayez ultérieurement.'), 'flash/error');
			}
		}
		$options = array('conditions' => array('WebLog.' . $this->WebLog->primaryKey => $id));
		$this->request->data = $this->WebLog->find('first', $options);
        $this->set('webLog', $this->request->data);

		$users = $this->WebLog->User->find('list');
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
		$this->WebLog->id = $id;
		if (!$this->WebLog->exists()) {
			throw new NotFoundException(__('Web Log invalide.'));
		}
		if ($this->WebLog->delete()) {
			$this->Session->setFlash(__('Web Log supprimé.'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Web Log impossible à supprimer.'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
