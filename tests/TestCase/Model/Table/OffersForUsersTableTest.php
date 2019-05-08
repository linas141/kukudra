<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OffersForUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OffersForUsersTable Test Case
 */
class OffersForUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OffersForUsersTable
     */
    public $OffersForUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.OffersForUsers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('OffersForUsers') ? [] : ['className' => OffersForUsersTable::class];
        $this->OffersForUsers = TableRegistry::getTableLocator()->get('OffersForUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OffersForUsers);

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
