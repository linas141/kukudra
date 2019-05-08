<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ReservedDishFixture
 *
 */
class ReservedDishFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'reserved_dish';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'fk_ReservationNumber' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'fk_dish_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_dish_id' => ['type' => 'index', 'columns' => ['fk_dish_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['fk_ReservationNumber'], 'length' => []],
            'fk_dish_id' => ['type' => 'foreign', 'columns' => ['fk_dish_id'], 'references' => ['dish', 'id_Dish'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
            'fk_reservationid_Number' => ['type' => 'foreign', 'columns' => ['fk_ReservationNumber'], 'references' => ['reservation', 'Number'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'fk_ReservationNumber' => 1,
                'fk_dish_id' => 1
            ],
        ];
        parent::init();
    }
}
