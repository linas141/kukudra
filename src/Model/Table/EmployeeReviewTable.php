<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EmployeeReview Model
 *
 * @method \App\Model\Entity\EmployeeReview get($primaryKey, $options = [])
 * @method \App\Model\Entity\EmployeeReview newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EmployeeReview[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EmployeeReview|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EmployeeReview|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EmployeeReview patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EmployeeReview[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EmployeeReview findOrCreate($search, callable $callback = null, $options = [])
 */
class EmployeeReviewTable extends Table
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
		$this->belongsTo('review')
			->setForeignKey('id_Review')
			->setJoinType('INNER');
		$this->belongsTo('User')
			->setForeignKey('employee_fkID')
			->setJoinType('INNER');

        $this->setTable('employee_review');
        $this->setDisplayField('id_Review');
        $this->setPrimaryKey('id_Review');
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
            ->integer('id_Review')
            ->allowEmptyString('id_Review', 'create');

        $validator
            ->integer('employee_fkID')
            ->allowEmptyString('employee_fkID');

        return $validator;
    }
}
