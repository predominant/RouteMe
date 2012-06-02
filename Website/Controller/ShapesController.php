<?php
App::uses('AppController', 'Controller');
/**
 * Shapes Controller
 *
 * @property Shape $Shape
 */
class ShapesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Shape->recursive = 0;
		$this->set('shapes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Shape->id = $id;
		if (!$this->Shape->exists()) {
			throw new NotFoundException(__('Invalid shape'));
		}
		$this->set('shape', $this->Shape->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Shape->create();
			if ($this->Shape->save($this->request->data)) {
				$this->Session->setFlash(__('The shape has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The shape could not be saved. Please, try again.'));
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
		$this->Shape->id = $id;
		if (!$this->Shape->exists()) {
			throw new NotFoundException(__('Invalid shape'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Shape->save($this->request->data)) {
				$this->Session->setFlash(__('The shape has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The shape could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Shape->read(null, $id);
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
		$this->Shape->id = $id;
		if (!$this->Shape->exists()) {
			throw new NotFoundException(__('Invalid shape'));
		}
		if ($this->Shape->delete()) {
			$this->Session->setFlash(__('Shape deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Shape was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
