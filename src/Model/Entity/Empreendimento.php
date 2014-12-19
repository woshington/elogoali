<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Empreendimento Entity.
 */
class Empreendimento extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'telefone' => true,
		'nome_fantasia' => true,
		'logradouro' => true,
		'numero' => true,
		'cep' => true,
		'cidade_id' => true,
		'ramo_id' => true,
		'cidade' => true,
		'ramo' => true,
		'avaliacao' => true,
	];

}
