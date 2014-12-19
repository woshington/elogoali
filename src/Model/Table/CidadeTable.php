<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cidade Model
 */
class CidadeTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('cidade');
		$this->displayField('nome');
		$this->primaryKey('id');
		$this->belongsTo('Estado', [
			'alias' => 'Estado',
			'foreignKey' => 'estado_id'
		]);
		$this->hasMany('Empreendimento', [
			'alias' => 'Empreendimento',
			'foreignKey' => 'cidade_id'
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
			->requirePresence('nome', 'create')
			->notEmpty('nome')
			->add('estado_id', 'valid', ['rule' => 'numeric'])
			->requirePresence('estado_id', 'create')
			->notEmpty('estado_id');

		return $validator;
	}

}
