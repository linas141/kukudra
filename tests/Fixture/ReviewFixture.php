<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ReviewFixture
 *
 */
class ReviewFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'review';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'Review' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'id_Review' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'fk_Userid_User' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'datePublished' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'rating' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => '5', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_publishedUser' => ['type' => 'index', 'columns' => ['fk_Userid_User'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_Review'], 'length' => []],
            'fk_publishedUser' => ['type' => 'foreign', 'columns' => ['fk_Userid_User'], 'references' => ['user', 'id_User'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
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
                'Review' => 'Lorem ipsum dolor sit amet',
                'id_Review' => 1,
                'fk_Userid_User' => 1,
                'datePublished' => '2019-04-27',
                'rating' => 1
            ],
        ];
        parent::init();
    }
}
