<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ramo Model
 */
class RamoTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('ramo');
		$this->displayField('descricao');
		$this->primaryKey('id');
		$this->hasMany('Empreendimento', [
			'alias' => 'Empreendimento',
			'foreignKey' => 'ramo_id'
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
			->requirePresence('descricao', 'create')
			->notEmpty('descricao');

		return $validator;
	}

}
