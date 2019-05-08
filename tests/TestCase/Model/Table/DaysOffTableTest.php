<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DaysOffTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DaysOffTable Test Case
 */
class DaysOffTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DaysOffTable
     */
    public $DaysOff;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.DaysOff',
        'app.User'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DaysOff') ? [] : ['className' => DaysOffTable::class];
        $this->DaysOff = TableRegistry::getTableLocator()->get('DaysOff', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DaysOff);

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
