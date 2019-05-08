<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OffersForUsers Model
 *
 * @method \App\Model\Entity\OffersForUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\OffersForUser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OffersForUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OffersForUser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OffersForUser|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OffersForUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OffersForUser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OffersForUser findOrCreate($search, callable $callback = null, $options = [])
 */
class OffersForUsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('offers_for_users');
        $this->setDisplayField('fk_Userid_User');
        $this->setPrimaryKey('fk_Userid_User');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('fk_Userid_User')
            ->allowEmptyString('fk_Userid_User', 'create');

        return $validator;
    }
}
