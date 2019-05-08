<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * WorkSchedule Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $work_date
 * @property int $employee_fkID
 */
class WorkSchedule extends Entity
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
        'work_date' => true,
        'employee_fkID' => true,
        'fulfilled' => true
    ];
}
