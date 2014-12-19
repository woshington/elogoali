<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Avaliacao Model
 */
class AvaliacaoTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('avaliacao');
		$this->displayField('id');
		$this->primaryKey('id');
		$this->addBehavior('Timestamp');
		$this->belongsTo('Empreendimentos', [
			'alias' => 'Empreendimentos',
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
			->add('estrelas', 'valid', ['rule' => 'numeric'])
			->requirePresence('estrelas', 'create')
			->notEmpty('estrelas')
			->add('empreendimento_id', 'valid', ['rule' => 'numeric'])
			->requirePresence('empreendimento_id', 'create')
			->notEmpty('empreendimento_id');

		return $validator;
	}

}
