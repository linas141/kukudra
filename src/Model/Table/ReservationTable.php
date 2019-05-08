<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Reservation Model
 *
 * @method \App\Model\Entity\Reservation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Reservation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Reservation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Reservation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Reservation|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Reservation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Reservation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Reservation findOrCreate($search, callable $callback = null, $options = [])
 */
class ReservationTable extends Table
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
		$this->belongsTo('User')
			->setForeignKey('Reserver');
		$this->hasMany('reserved_dish')
			->setForeignKey('Number');

        $this->setTable('reservation');
        $this->setDisplayField('Number');
        $this->setPrimaryKey('Number');
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
            ->integer('Number')
            ->allowEmptyString('Number', 'create');

        $validator
            ->date('Date')
            ->allowEmptyDate('Date');

        $validator
            ->integer('Reserver')
            ->allowEmptyString('Reserver', false);

        $validator
            ->scalar('State')
            ->maxLength('State', 11)
            ->allowEmptyString('State', false);

        $validator
            ->scalar('Type')
            ->maxLength('Type', 255)
            ->allowEmptyString('Type', false);

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->allowEmptyString('name', false);

        $validator
            ->scalar('lastName')
            ->maxLength('lastName', 255)
            ->allowEmptyString('lastName', false);

        $validator
            ->email('email')
            ->allowEmptyString('email', false);

        $validator
            ->integer('phone')
            ->allowEmptyString('phone');

        $validator
            ->integer('amountOfPeople')
            ->allowEmptyString('amountOfPeople');

        $validator
            ->dateTime('dateTime')
            ->allowEmptyDateTime('dateTime', false);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        //$rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
