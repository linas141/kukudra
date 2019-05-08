<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FoodReviewTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FoodReviewTable Test Case
 */
class FoodReviewTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FoodReviewTable
     */
    public $FoodReview;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.FoodReview'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('FoodReview') ? [] : ['className' => FoodReviewTable::class];
        $this->FoodReview = TableRegistry::getTableLocator()->get('FoodReview', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FoodReview);

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
