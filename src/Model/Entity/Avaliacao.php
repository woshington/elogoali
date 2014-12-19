<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Avaliacao Entity.
 */
class Avaliacao extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'estrelas' => true,
		'empreendimento_id' => true,
		'empreendimento' => true,
	];

}
