<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ramo Controller
 *
 * @property \App\Model\Table\RamoTable $Ramo
 */
class RamoController extends AppController {

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->set('ramo', $this->paginate($this->Ramo));
	}

/**
 * View method
 *
 * @param string|null $id Ramo id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		$ramo = $this->Ramo->get($id, [
			'contain' => ['Empreendimento']
		]);
		$this->set('ramo', $ramo);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$ramo = $this->Ramo->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Ramo->save($ramo)) {
				$this->Flash->success('The ramo has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The ramo could not be saved. Please, try again.');
			}
		}
		$this->set(compact('ramo'));
	}

/**
 * Edit method
 *
 * @param string|null $id Ramo id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$ramo = $this->Ramo->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$ramo = $this->Ramo->patchEntity($ramo, $this->request->data);
			if ($this->Ramo->save($ramo)) {
				$this->Flash->success('The ramo has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The ramo could not be saved. Please, try again.');
			}
		}
		$this->set(compact('ramo'));
	}

/**
 * Delete method
 *
 * @param string|null $id Ramo id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$ramo = $this->Ramo->get($id);
		$this->request->allowMethod(['post', 'delete']);
		if ($this->Ramo->delete($ramo)) {
			$this->Flash->success('The ramo has been deleted.');
		} else {
			$this->Flash->error('The ramo could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}

}
