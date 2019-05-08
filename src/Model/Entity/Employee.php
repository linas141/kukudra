<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Employee Entity
 *
 * @property string|null $First_name
 * @property string|null $Last_name
 * @property int $id_User
 *
 * @property \App\Model\Entity\EmployeeReview[] $employee_review
 * @property \App\Model\Entity\Review[] $review
 */
class Employee extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'First_name' => true,
        'Last_name' => true,
        'employee_review' => true,
        'review' => true
    ];
}
