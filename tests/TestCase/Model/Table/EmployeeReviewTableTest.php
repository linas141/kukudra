<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmployeeReviewTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmployeeReviewTable Test Case
 */
class EmployeeReviewTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EmployeeReviewTable
     */
    public $EmployeeReview;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.EmployeeReview'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('EmployeeReview') ? [] : ['className' => EmployeeReviewTable::class];
        $this->EmployeeReview = TableRegistry::getTableLocator()->get('EmployeeReview', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EmployeeReview);

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
