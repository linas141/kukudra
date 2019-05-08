<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReservedDishTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReservedDishTable Test Case
 */
class ReservedDishTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ReservedDishTable
     */
    public $ReservedDish;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ReservedDish',
        'app.Dish'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ReservedDish') ? [] : ['className' => ReservedDishTable::class];
        $this->ReservedDish = TableRegistry::getTableLocator()->get('ReservedDish', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ReservedDish);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
