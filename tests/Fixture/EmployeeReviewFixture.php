<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EmployeeReviewFixture
 *
 */
class EmployeeReviewFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'employee_review';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id_Review' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'employee_fkID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'employeefkID' => ['type' => 'index', 'columns' => ['employee_fkID'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_Review'], 'length' => []],
            'employeefkID' => ['type' => 'foreign', 'columns' => ['employee_fkID'], 'references' => ['user', 'id_User'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'employeeidReview' => ['type' => 'foreign', 'columns' => ['id_Review'], 'references' => ['review', 'id_Review'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'id_Review' => 1,
                'employee_fkID' => 1
            ],
        ];
        parent::init();
    }
}
