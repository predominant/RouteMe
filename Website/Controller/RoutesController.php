<?php
App::uses('AppController', 'Controller');
/**
 * Routes Controller
 *
 * @property Route $Route
 */
class RoutesController extends AppController {

	public function stops($id = null) {
		if (!$this->request->is('Ajax') || !$id) {
			$this->redirect(array('action' => 'index'));
		}
		
		$trips = $this->Route->Trip->findAllByRouteId($id);
		$stopTimes = $this->Route->Trip->StopTime->findAllByTripId(Set::extract($trips, '/Trip/id'));
		$stops = $this->Route->Trip->StopTime->Stop->findAllById(Set::extract($stopTimes, '/StopTime/stop_id'));
		$this->set(compact('stops'));
		$this->set('_serialize', 'stops');
	}


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Route->recursive = 0;
		$this->set('routes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Route->id = $id;
		if (!$this->Route->exists()) {
			throw new NotFoundException(__('Invalid route'));
		}
		$this->set('route', $this->Route->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Route->create();
			if ($this->Route->save($this->request->data)) {
				$this->Session->setFlash(__('The route has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The route could not be saved. Please, try again.'));
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
		$this->Route->id = $id;
		if (!$this->Route->exists()) {
			throw new NotFoundException(__('Invalid route'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Route->save($this->request->data)) {
				$this->Session->setFlash(__('The route has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The route could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Route->read(null, $id);
		}
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
		$this->Route->id = $id;
		if (!$this->Route->exists()) {
			throw new NotFoundException(__('Invalid route'));
		}
		if ($this->Route->delete()) {
			$this->Session->setFlash(__('Route deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Route was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
