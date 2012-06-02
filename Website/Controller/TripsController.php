<?php
App::uses('AppController', 'Controller');
/**
 * Trips Controller
 *
 * @property Trip $Trip
 */
class TripsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Trip->recursive = 0;
		$this->set('trips', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Trip->id = $id;
		if (!$this->Trip->exists()) {
			throw new NotFoundException(__('Invalid trip'));
		}
		$this->set('trip', $this->Trip->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Trip->create();
			if ($this->Trip->save($this->request->data)) {
				$this->Session->setFlash(__('The trip has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The trip could not be saved. Please, try again.'));
			}
		}
		$routes = $this->Trip->Route->find('list');
		$services = $this->Trip->Service->find('list');
		$trips = $this->Trip->Trip->find('list');
		$directions = $this->Trip->Direction->find('list');
		$blocks = $this->Trip->Block->find('list');
		$shapes = $this->Trip->Shape->find('list');
		$this->set(compact('routes', 'services', 'trips', 'directions', 'blocks', 'shapes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Trip->id = $id;
		if (!$this->Trip->exists()) {
			throw new NotFoundException(__('Invalid trip'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Trip->save($this->request->data)) {
				$this->Session->setFlash(__('The trip has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The trip could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Trip->read(null, $id);
		}
		$routes = $this->Trip->Route->find('list');
		$services = $this->Trip->Service->find('list');
		$trips = $this->Trip->Trip->find('list');
		$directions = $this->Trip->Direction->find('list');
		$blocks = $this->Trip->Block->find('list');
		$shapes = $this->Trip->Shape->find('list');
		$this->set(compact('routes', 'services', 'trips', 'directions', 'blocks', 'shapes'));
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
		$this->Trip->id = $id;
		if (!$this->Trip->exists()) {
			throw new NotFoundException(__('Invalid trip'));
		}
		if ($this->Trip->delete()) {
			$this->Session->setFlash(__('Trip deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Trip was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
