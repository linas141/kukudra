<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReservationTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReservationTable Test Case
 */
class ReservationTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ReservationTable
     */
    public $Reservation;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Reservation',
        'app.User',
        'app.ReservedDish'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Reservation') ? [] : ['className' => ReservationTable::class];
        $this->Reservation = TableRegistry::getTableLocator()->get('Reservation', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Reservation);

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
