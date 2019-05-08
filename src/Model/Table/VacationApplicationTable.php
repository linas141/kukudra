<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VacationApplication Model
 *
 * @method \App\Model\Entity\VacationApplication get($primaryKey, $options = [])
 * @method \App\Model\Entity\VacationApplication newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VacationApplication[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VacationApplication|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VacationApplication|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VacationApplication patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VacationApplication[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VacationApplication findOrCreate($search, callable $callback = null, $options = [])
 */
class VacationApplicationTable extends Table
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

        $this->setTable('vacation_application');
        $this->setDisplayField('id_Vacation_application');
        $this->setPrimaryKey('id_Vacation_application');
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
            ->date('Date_from')
            ->allowEmptyDate('Date_from');

        $validator
            ->date('Date_to')
            ->allowEmptyDate('Date_to');

        $validator
            ->scalar('Prie?astis')
            ->maxLength('Prie?astis', 255)
            ->allowEmptyString('Prie?astis');

        $validator
            ->integer('id_Vacation_application')
            ->allowEmptyString('id_Vacation_application', 'create');

        $validator
            ->integer('fk_Employeeid_User')
            ->requirePresence('fk_Employeeid_User', 'create')
            ->allowEmptyString('fk_Employeeid_User', false)
            ->add('fk_Employeeid_User', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['fk_Employeeid_User']));

        return $rules;
    }
}
