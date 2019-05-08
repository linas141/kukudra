<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DishTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DishTable Test Case
 */
class DishTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DishTable
     */
    public $Dish;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::getTableLocator()->exists('Dish') ? [] : ['className' => DishTable::class];
        $this->Dish = TableRegistry::getTableLocator()->get('Dish', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Dish);

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
