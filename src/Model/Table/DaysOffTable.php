<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DaysOff Model
 *
 * @method \App\Model\Entity\DaysOff get($primaryKey, $options = [])
 * @method \App\Model\Entity\DaysOff newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DaysOff[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DaysOff|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DaysOff|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DaysOff patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DaysOff[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DaysOff findOrCreate($search, callable $callback = null, $options = [])
 */
class DaysOffTable extends Table
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
			->setForeignKey('fk_Employeeid_User');

        $this->setTable('days_off');
        $this->setDisplayField('id_Days_off');
        $this->setPrimaryKey('id_Days_off');
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
            ->date('Day_from')
            ->allowEmptyDate('Day_from', false);

        $validator
            ->date('Day_to')
            ->allowEmptyDate('Day_to', false);

        $validator
            ->integer('id_Days_off')
            ->allowEmptyString('id_Days_off', 'create');

        $validator
            ->integer('fk_Employeeid_User')
            ->requirePresence('fk_Employeeid_User', 'create')
            ->allowEmptyString('fk_Employeeid_User', false);

        $validator
            ->scalar('State')
            ->maxLength('State', 255)
            ->requirePresence('State', 'create')
            ->allowEmptyString('State', false);

        $validator
            ->scalar('Comment')
            ->maxLength('Comment', 255)
            ->allowEmptyString('Comment');

        $validator
            ->scalar('Reason')
            ->maxLength('Reason', 255)
            ->allowEmptyString('Reason');

        $validator
            ->scalar('Viewed')
            ->maxLength('Viewed', 255)
            ->requirePresence('Viewed', 'create')
            ->allowEmptyString('Viewed', false);

        return $validator;
    }
}
