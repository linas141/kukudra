<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WorkScheduleTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WorkScheduleTable Test Case
 */
class WorkScheduleTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WorkScheduleTable
     */
    public $WorkSchedule;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.WorkSchedule'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('WorkSchedule') ? [] : ['className' => WorkScheduleTable::class];
        $this->WorkSchedule = TableRegistry::getTableLocator()->get('WorkSchedule', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->WorkSchedule);

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
