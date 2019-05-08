<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FoodReviewFixture
 *
 */
class FoodReviewFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'food_review';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id_Review' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_Review'], 'length' => []],
            'foodidReview' => ['type' => 'foreign', 'columns' => ['id_Review'], 'references' => ['review', 'id_Review'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id_Review' => 1
            ],
        ];
        parent::init();
    }
}
