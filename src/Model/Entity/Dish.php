<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Dish Entity
 *
 * @property string|null $Name
 * @property float|null $Price
 * @property string|null $Contains_products
 * @property int $id_Dish
 * @property string|null $dishType
 */
class Dish extends Entity
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
        'Name' => true,
        'Price' => true,
        'Contains_products' => true,
        'dishType' => true
    ];
}
