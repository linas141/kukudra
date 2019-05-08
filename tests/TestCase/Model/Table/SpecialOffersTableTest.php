<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SpecialOffersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SpecialOffersTable Test Case
 */
class SpecialOffersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SpecialOffersTable
     */
    public $SpecialOffers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.SpecialOffers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SpecialOffers') ? [] : ['className' => SpecialOffersTable::class];
        $this->SpecialOffers = TableRegistry::getTableLocator()->get('SpecialOffers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SpecialOffers);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
