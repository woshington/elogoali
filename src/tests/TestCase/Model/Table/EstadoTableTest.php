<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EstadoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EstadoTable Test Case
 */
class EstadoTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'Estado' => 'app.estado',
		'Cidade' => 'app.cidade',
		'Estados' => 'app.estados',
		'Empreendimento' => 'app.empreendimento',
		'Cidades' => 'app.cidades',
		'Ramos' => 'app.ramos',
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
		$config = TableRegistry::exists('Estado') ? [] : ['className' => 'App\Model\Table\EstadoTable'];
		$this->Estado = TableRegistry::get('Estado', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Estado);

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
