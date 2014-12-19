<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Empreendimento Controller
 *
 * @property \App\Model\Table\EmpreendimentoTable $Empreendimento
 */
class EmpreendimentoController extends AppController {

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->paginate = [
			'contain' => ['Cidade', 'Ramo']
		];
		$this->set('empreendimento', $this->paginate($this->Empreendimento));
	}

/**
 * View method
 *
 * @param string|null $id Empreendimento id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		$empreendimento = $this->Empreendimento->get($id, [
			'contain' => ['Cidade', 'Ramo', 'Avaliacao']
		]);
		$this->set('empreendimento', $empreendimento);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$empreendimento = $this->Empreendimento->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Empreendimento->save($empreendimento)) {
				$this->Flash->success('The empreendimento has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The empreendimento could not be saved. Please, try again.');
			}
		}
		$cidade = $this->Empreendimento->Cidade->find('list', ['limit' => 200]);
		$ramo = $this->Empreendimento->Ramo->find('list', ['limit' => 200]);
		$this->set(compact('empreendimento', 'cidade', 'ramo'));
	}

/**
 * Edit method
 *
 * @param string|null $id Empreendimento id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$empreendimento = $this->Empreendimento->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$empreendimento = $this->Empreendimento->patchEntity($empreendimento, $this->request->data);
			if ($this->Empreendimento->save($empreendimento)) {
				$this->Flash->success('The empreendimento has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The empreendimento could not be saved. Please, try again.');
			}
		}
		$cidade = $this->Empreendimento->Cidade->find('list', ['limit' => 200]);
		$ramo = $this->Empreendimento->Ramo->find('list', ['limit' => 200]);
		$this->set(compact('empreendimento', 'cidade', 'ramo'));
	}

/**
 * Delete method
 *
 * @param string|null $id Empreendimento id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$empreendimento = $this->Empreendimento->get($id);
		$this->request->allowMethod(['post', 'delete']);
		if ($this->Empreendimento->delete($empreendimento)) {
			$this->Flash->success('The empreendimento has been deleted.');
		} else {
			$this->Flash->error('The empreendimento could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}

}
