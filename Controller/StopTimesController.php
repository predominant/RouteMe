<?php
App::uses('AppController', 'Controller');
/**
 * StopTimes Controller
 *
 * @property StopTime $StopTime
 */
class StopTimesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->StopTime->recursive = 0;
		$this->set('stopTimes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->StopTime->id = $id;
		if (!$this->StopTime->exists()) {
			throw new NotFoundException(__('Invalid stop time'));
		}
		$this->set('stopTime', $this->StopTime->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StopTime->create();
			if ($this->StopTime->save($this->request->data)) {
				$this->Session->setFlash(__('The stop time has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stop time could not be saved. Please, try again.'));
			}
		}
		$trips = $this->StopTime->Trip->find('list');
		$stops = $this->StopTime->Stop->find('list');
		$this->set(compact('trips', 'stops'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->StopTime->id = $id;
		if (!$this->StopTime->exists()) {
			throw new NotFoundException(__('Invalid stop time'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->StopTime->save($this->request->data)) {
				$this->Session->setFlash(__('The stop time has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stop time could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->StopTime->read(null, $id);
		}
		$trips = $this->StopTime->Trip->find('list');
		$stops = $this->StopTime->Stop->find('list');
		$this->set(compact('trips', 'stops'));
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
		$this->StopTime->id = $id;
		if (!$this->StopTime->exists()) {
			throw new NotFoundException(__('Invalid stop time'));
		}
		if ($this->StopTime->delete()) {
			$this->Session->setFlash(__('Stop time deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Stop time was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
