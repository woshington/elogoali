<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Empreendimento Model
 */
class EmpreendimentoTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('empreendimento');
		$this->displayField('nome_fantasia');
		$this->primaryKey('id');
		$this->belongsTo('Cidade', [
			'alias' => 'Cidade',
			'foreignKey' => 'cidade_id'
		]);
		$this->belongsTo('Ramo', [
			'alias' => 'Ramo',
			'foreignKey' => 'ramo_id'
		]);
		$this->hasMany('Avaliacao', [
			'alias' => 'Avaliacao',
			'foreignKey' => 'empreendimento_id'
		]);
	}

/**
 * Default validation rules.
 *
 * @param \Cake\Validation\Validator $validator instance
 * @return \Cake\Validation\Validator
 */
	public function validationDefault(Validator $validator) {
		$validator
			->add('id', 'valid', ['rule' => 'numeric'])
			->allowEmpty('id', 'create')
			->requirePresence('telefone', 'create')
			->notEmpty('telefone')
			->requirePresence('nome_fantasia', 'create')
			->notEmpty('nome_fantasia')
			->requirePresence('logradouro', 'create')
			->notEmpty('logradouro')
			->requirePresence('numero', 'create')
			->notEmpty('numero')
			->add('cep', 'valid', ['rule' => 'numeric'])
			->requirePresence('cep', 'create')
			->notEmpty('cep')
			->add('cidade_id', 'valid', ['rule' => 'numeric'])
			->requirePresence('cidade_id', 'create')
			->notEmpty('cidade_id')
			->add('ramo_id', 'valid', ['rule' => 'numeric'])
			->requirePresence('ramo_id', 'create')
			->notEmpty('ramo_id');

		return $validator;
	}

}
