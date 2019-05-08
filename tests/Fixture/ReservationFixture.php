<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ReservationFixture
 *
 */
class ReservationFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'reservation';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'Number' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'Date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'Reserver' => ['type' => 'integer', 'length' => 255, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'State' => ['type' => 'string', 'fixed' => true, 'length' => 11, 'null' => true, 'default' => 'Pateikta', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'Type' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => 'Food', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'name' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'lastName' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'email' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'phone' => ['type' => 'integer', 'length' => 255, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'amountOfPeople' => ['type' => 'integer', 'length' => 255, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'dateTime' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_reserverid' => ['type' => 'index', 'columns' => ['Reserver'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['Number'], 'length' => []],
            'fk_reserverid' => ['type' => 'foreign', 'columns' => ['Reserver'], 'references' => ['user', 'id_User'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
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
                'Number' => 1,
                'Date' => '2019-05-04',
                'Reserver' => 1,
                'State' => 'Lorem ips',
                'Type' => 'Lorem ipsum dolor sit amet',
                'name' => 'Lorem ipsum dolor sit amet',
                'lastName' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'phone' => 1,
                'amountOfPeople' => 1,
                'dateTime' => '2019-05-04 09:57:25'
            ],
        ];
        parent::init();
    }
}
