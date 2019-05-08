<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VacationApplication Entity
 *
 * @property \Cake\I18n\FrozenDate|null $Date_from
 * @property \Cake\I18n\FrozenDate|null $Date_to
 * @property string|null $Prie?astis
 * @property int $id_Vacation_application
 * @property int $fk_Employeeid_User
 */
class VacationApplication extends Entity
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
        'Date_from' => true,
        'Date_to' => true,
        'Prie?astis' => true,
        'fk_Employeeid_User' => true
    ];
}
