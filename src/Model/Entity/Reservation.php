<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reservation Entity
 *
 * @property int $Number
 * @property \Cake\I18n\FrozenDate|null $Date
 * @property int|null $Reserver
 * @property string|null $State
 * @property string|null $Type
 * @property int|null $fk_Food_reviewid_Review
 * @property string|null $name
 * @property string|null $lastName
 * @property string|null $email
 * @property int|null $phone
 * @property int|null $amountOfPeople
 * @property \Cake\I18n\FrozenTime|null $dateTime
 */
class Reservation extends Entity
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
        'Date' => true,
        'Reserver' => true,
        'State' => true,
        'Type' => true,
        'name' => true,
        'lastName' => true,
        'email' => true,
        'phone' => true,
        'amountOfPeople' => true,
        'dateTime' => true
    ];
}
