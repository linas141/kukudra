<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Review Entity
 *
 * @property string|null $Review
 * @property int $id_Review
 * @property int $fk_Userid_User
 * @property \Cake\I18n\FrozenDate|null $datePublished
 * @property int|null $rating
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\EmployeeReview[] $employee_review
 * @property \App\Model\Entity\EnviromentReview[] $enviroment_review
 * @property \App\Model\Entity\FoodReview[] $food_review
 */
class Review extends Entity
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
        'Review' => true,
        'fk_Userid_User' => true,
        'datePublished' => true,
        'rating' => true,
        'user' => true,
        'employee_review' => true,
        'enviroment_review' => true,
        'food_review' => true
    ];
}
