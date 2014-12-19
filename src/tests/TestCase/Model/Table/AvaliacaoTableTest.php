<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AvaliacaoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AvaliacaoTable Test Case
 */
class AvaliacaoTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'Avaliacao' => 'app.avaliacao',
		'Empreendimentos' => 'app.empreendimentos'
	];

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('Avaliacao') ? [] : ['className' => 'App\Model\Table\AvaliacaoTable'];
		$this->Avaliacao = TableRegistry::get('Avaliacao', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Avaliacao);

		parent::tearDown();
	}

/**
 * Test initialize method
 *
 * @return void
 */
	public function testInitialize() {
		$this->markTestIncomplete('Not implemented yet.');
	}

/**
 * Test validationDefault method
 *
 * @return void
 */
	public function testValidationDefault() {
		$this->markTestIncomplete('Not implemented yet.');
	}

}
