<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
/**
 * User Entity
 *
 * @property string $username
 * @property string $password
 * @property string|null $First_name
 * @property string|null $Last_name
 * @property float|null $Phone_nr
 * @property int $id_User
 * @property int|null $fk_ReservationNumber
 * @property string $role
 * @property string|null $Last_IP
 */
class User extends Entity
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
        'username' => true,
        'password' => true,
        'First_name' => true,
        'Last_name' => true,
        'Phone_nr' => true,
        'role' => true,
        'Last_IP' => true,
        'token' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
	
	protected function _setPassword($password){
		return (new DefaultPasswordHasher)->hash($password);
	}
}
