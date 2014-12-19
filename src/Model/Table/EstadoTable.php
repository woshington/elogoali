<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Estado Model
 */
class EstadoTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('estado');
		$this->displayField('nome');
		$this->primaryKey('id');
		$this->hasMany('Cidade', [
			'alias' => 'Cidade',
			'foreignKey' => 'estado_id'
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
			->requirePresence('UF', 'create')
			->notEmpty('UF');

		return $validator;
	}

}
