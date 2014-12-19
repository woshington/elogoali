<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EmpreendimentoFixture
 *
 */
class EmpreendimentoFixture extends TestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'empreendimento';

/**
 * Fields
 *
 * @var array
 */
	public $fields = [
		'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
		'telefone' => ['type' => 'string', 'length' => 12, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
		'nome_fantasia' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
		'logradouro' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
		'numero' => ['type' => 'string', 'length' => 10, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
		'cep' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
		'cidade_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
		'ramo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
		'_indexes' => [
			'fk_empreendimento_cidade1_idx' => ['type' => 'index', 'columns' => ['cidade_id'], 'length' => []],
			'fk_empreendimento_ramo1_idx' => ['type' => 'index', 'columns' => ['ramo_id'], 'length' => []],
		],
		'_constraints' => [
			'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
			'fk_empreendimento_cidade1' => ['type' => 'foreign', 'columns' => ['cidade_id'], 'references' => ['cidade', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
			'fk_empreendimento_ramo1' => ['type' => 'foreign', 'columns' => ['ramo_id'], 'references' => ['ramo', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
		],
		'_options' => [
'engine' => 'InnoDB', 'collation' => 'utf8_general_ci'
		],
	];

/**
 * Records
 *
 * @var array
 */
	public $records = [
		[
			'id' => 1,
			'telefone' => 'Lorem ipsu',
			'nome_fantasia' => 'Lorem ipsum dolor sit amet',
			'logradouro' => 'Lorem ipsum dolor sit amet',
			'numero' => 'Lorem ip',
			'cep' => 1,
			'cidade_id' => 1,
			'ramo_id' => 1
		],
	];

}
