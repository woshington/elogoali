<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Estado Controller
 *
 * @property \App\Model\Table\EstadoTable $Estado
 */
class EstadoController extends AppController {

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->set('estado', $this->paginate($this->Estado));
	}

/**
 * View method
 *
 * @param string|null $id Estado id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		$estado = $this->Estado->get($id, [
			'contain' => ['Cidade']
		]);
		$this->set('estado', $estado);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$estado = $this->Estado->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Estado->save($estado)) {
				$this->Flash->success('The estado has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The estado could not be saved. Please, try again.');
			}
		}
		$this->set(compact('estado'));
	}

/**
 * Edit method
 *
 * @param string|null $id Estado id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$estado = $this->Estado->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$estado = $this->Estado->patchEntity($estado, $this->request->data);
			if ($this->Estado->save($estado)) {
				$this->Flash->success('The estado has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The estado could not be saved. Please, try again.');
			}
		}
		$this->set(compact('estado'));
	}

/**
 * Delete method
 *
 * @param string|null $id Estado id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$estado = $this->Estado->get($id);
		$this->request->allowMethod(['post', 'delete']);
		if ($this->Estado->delete($estado)) {
			$this->Flash->success('The estado has been deleted.');
		} else {
			$this->Flash->error('The estado could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}

}
