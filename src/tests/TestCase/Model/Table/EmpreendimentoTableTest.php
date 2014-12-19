<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmpreendimentoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmpreendimentoTable Test Case
 */
class EmpreendimentoTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'Empreendimento' => 'app.empreendimento',
		'Cidades' => 'app.cidades',
		'Ramos' => 'app.ramos',
		'Avaliacao' => 'app.avaliacao'
	];

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('Empreendimento') ? [] : ['className' => 'App\Model\Table\EmpreendimentoTable'];
		$this->Empreendimento = TableRegistry::get('Empreendimento', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Empreendimento);

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
