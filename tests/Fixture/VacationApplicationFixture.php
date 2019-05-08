<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VacationApplicationFixture
 *
 */
class VacationApplicationFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'vacation_application';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'Date_from' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'Date_to' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'Prie?astis' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'id_Vacation_application' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'fk_Employeeid_User' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_Vacation_application'], 'length' => []],
            'fk_Employeeid_User' => ['type' => 'unique', 'columns' => ['fk_Employeeid_User'], 'length' => []],
            'fk_Employee' => ['type' => 'foreign', 'columns' => ['fk_Employeeid_User'], 'references' => ['user', 'id_User'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'Date_from' => '2019-03-10',
                'Date_to' => '2019-03-10',
                'Prie?astis' => 'Lorem ipsum dolor sit amet',
                'id_Vacation_application' => 1,
                'fk_Employeeid_User' => 1
            ],
        ];
        parent::init();
    }
}
