<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DaysOff Entity
 *
 * @property \Cake\I18n\FrozenDate|null $Day_from
 * @property \Cake\I18n\FrozenDate|null $Day_to
 * @property int $id_Days_off
 * @property int $fk_Employeeid_User
 * @property string $State
 * @property string|null $Comment
 * @property string $Viewed
 *
 * @property \App\Model\Entity\User $user
 */
class DaysOff extends Entity
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
        'Day_from' => true,
        'Day_to' => true,
        'fk_Employeeid_User' => true,
        'State' => true,
        'Comment' => true,
        'Viewed' => true,
        'Reason' => true,
        'user' => true
    ];
}
