<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ReservedDish Entity
 *
 * @property int $fk_ReservationNumber
 * @property int $fk_dish_id
 *
 * @property \App\Model\Entity\Dish $dish
 */
class ReservedDish extends Entity
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
        'fk_dish_id' => true,
        'dish' => true
    ];
}
