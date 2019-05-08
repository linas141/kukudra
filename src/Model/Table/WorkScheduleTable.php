<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WorkSchedule Model
 *
 * @method \App\Model\Entity\WorkSchedule get($primaryKey, $options = [])
 * @method \App\Model\Entity\WorkSchedule newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\WorkSchedule[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WorkSchedule|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WorkSchedule|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WorkSchedule patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\WorkSchedule[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\WorkSchedule findOrCreate($search, callable $callback = null, $options = [])
 */
class WorkScheduleTable extends Table
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
			->setForeignKey('employee_fkID');

        $this->setTable('work_schedule');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->date('work_date')
            ->requirePresence('work_date', 'create')
            ->allowEmptyDate('work_date', false);

        $validator
            ->integer('employee_fkID')
            ->requirePresence('employee_fkID', 'create')
            ->allowEmptyString('employee_fkID', false);

		$validator
            ->scalar('fulfilled')
            ->maxLength('fulfilled', 255)
            ->allowEmptyString('fulfilled', false, 'Turite pasirinkti, ar išpildė reikalavimą!');

        return $validator;
    }
}
