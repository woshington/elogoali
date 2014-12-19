<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cidade Controller
 *
 * @property \App\Model\Table\CidadeTable $Cidade
 */
class CidadeController extends AppController {

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->paginate = [
			'contain' => ['Estado']
		];
		$this->set('cidade', $this->paginate($this->Cidade));
	}

/**
 * View method
 *
 * @param string|null $id Cidade id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		$cidade = $this->Cidade->get($id, [
			'contain' => ['Estado', 'Empreendimento']
		]);
		$this->set('cidade', $cidade);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$cidade = $this->Cidade->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Cidade->save($cidade)) {
				$this->Flash->success('The cidade has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The cidade could not be saved. Please, try again.');
			}
		}
		$estado = $this->Cidade->Estado->find('list', ['limit' => 200]);
		$this->set(compact('cidade', 'estado'));
	}

/**
 * Edit method
 *
 * @param string|null $id Cidade id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$cidade = $this->Cidade->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$cidade = $this->Cidade->patchEntity($cidade, $this->request->data);
			if ($this->Cidade->save($cidade)) {
				$this->Flash->success('The cidade has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The cidade could not be saved. Please, try again.');
			}
		}
		$estado = $this->Cidade->Estado->find('list', ['limit' => 200]);
		$this->set(compact('cidade', 'estado'));
	}

/**
 * Delete method
 *
 * @param string|null $id Cidade id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$cidade = $this->Cidade->get($id);
		$this->request->allowMethod(['post', 'delete']);
		if ($this->Cidade->delete($cidade)) {
			$this->Flash->success('The cidade has been deleted.');
		} else {
			$this->Flash->error('The cidade could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}

}
