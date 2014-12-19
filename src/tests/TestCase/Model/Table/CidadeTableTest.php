<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CidadeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CidadeTable Test Case
 */
class CidadeTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
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
		$config = TableRegistry::exists('Cidade') ? [] : ['className' => 'App\Model\Table\CidadeTable'];
		$this->Cidade = TableRegistry::get('Cidade', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cidade);

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
