<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EnviromentReviewTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EnviromentReviewTable Test Case
 */
class EnviromentReviewTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EnviromentReviewTable
     */
    public $EnviromentReview;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.EnviromentReview'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('EnviromentReview') ? [] : ['className' => EnviromentReviewTable::class];
        $this->EnviromentReview = TableRegistry::getTableLocator()->get('EnviromentReview', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EnviromentReview);

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
