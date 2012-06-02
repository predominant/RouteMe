<?php
App::uses('AppController', 'Controller');
/**
 * Stops Controller
 *
 * @property Stop $Stop
 */
class StopsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Stop->recursive = 0;
		if ($this->request->is('Ajax')) {
			$this->set('stops', $this->Stop->find('all'));
			$this->set('_serialize', 'stops');
		} else {
			$this->set('stops', $this->paginate());
		}
	}

	// public function route($id = null) {
	// 	if (!$id) {
	// 		return $this->redirect(array('action' => 'index'));
	// 	}
	// 	$this->paginate = array(
	// 		'contain' => array(
	// 				'Trip' => array(
	// 					'Route' => array(
	// 						'conditions' => array('Route.id' => $id)
	// 					)
	// 				)
	// 		)
	// 	);
	// 	$this->set('stops', $this->paginate());
	// 	$this->render('index');
	// }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Stop->id = $id;
		if (!$this->Stop->exists()) {
			throw new NotFoundException(__('Invalid stop'));
		}
		$this->set('stop', $this->Stop->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Stop->create();
			if ($this->Stop->save($this->request->data)) {
				$this->Session->setFlash(__('The stop has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stop could not be saved. Please, try again.'));
			}
		}
		$zones = $this->Stop->Zone->find('list');
		$this->set(compact('zones'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Stop->id = $id;
		if (!$this->Stop->exists()) {
			throw new NotFoundException(__('Invalid stop'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Stop->save($this->request->data)) {
				$this->Session->setFlash(__('The stop has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stop could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Stop->read(null, $id);
		}
		$zones = $this->Stop->Zone->find('list');
		$this->set(compact('zones'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Stop->id = $id;
		if (!$this->Stop->exists()) {
			throw new NotFoundException(__('Invalid stop'));
		}
		if ($this->Stop->delete()) {
			$this->Session->setFlash(__('Stop deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Stop was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
