<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cidade Entity.
 */
class Cidade extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'nome' => true,
		'estado_id' => true,
		'estado' => true,
		'empreendimento' => true,
	];

}
