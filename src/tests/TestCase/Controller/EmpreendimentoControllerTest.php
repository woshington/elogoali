<?php
namespace App\Test\TestCase\Controller;

use App\Controller\EmpreendimentoController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\EmpreendimentoController Test Case
 */
class EmpreendimentoControllerTest extends IntegrationTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'Empreendimento' => 'app.empreendimento',
		'Cidade' => 'app.cidade',
		'Estado' => 'app.estado',
		'Ramo' => 'app.ramo',
		'Avaliacao' => 'app.avaliacao',
		'Empreendimentos' => 'app.empreendimentos'
	];

/**
 * Test index method
 *
 * @return void
 */
	public function testIndex() {
		$this->markTestIncomplete('Not implemented yet.');
	}

/**
 * Test view method
 *
 * @return void
 */
	public function testView() {
		$this->markTestIncomplete('Not implemented yet.');
	}

/**
 * Test add method
 *
 * @return void
 */
	public function testAdd() {
		$this->markTestIncomplete('Not implemented yet.');
	}

/**
 * Test edit method
 *
 * @return void
 */
	public function testEdit() {
		$this->markTestIncomplete('Not implemented yet.');
	}

/**
 * Test delete method
 *
 * @return void
 */
	public function testDelete() {
		$this->markTestIncomplete('Not implemented yet.');
	}

}
