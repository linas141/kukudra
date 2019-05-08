<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DaysOffFixture
 *
 */
class DaysOffFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'days_off';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'Day_from' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'Day_to' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'id_Days_off' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'fk_Employeeid_User' => ['type' => 'integer', 'length' => 250, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'State' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => 'Pateiktas', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Comment' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Viewed' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => 'Ne', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'fk_EmployeeId' => ['type' => 'index', 'columns' => ['fk_Employeeid_User'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_Days_off'], 'length' => []],
            'fk_EmployeeId' => ['type' => 'foreign', 'columns' => ['fk_Employeeid_User'], 'references' => ['user', 'id_User'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'Day_from' => '2019-03-12',
                'Day_to' => '2019-03-12',
                'id_Days_off' => 1,
                'fk_Employeeid_User' => 1,
                'State' => 'Lorem ipsum dolor sit amet',
                'Comment' => 'Lorem ipsum dolor sit amet',
                'Viewed' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
