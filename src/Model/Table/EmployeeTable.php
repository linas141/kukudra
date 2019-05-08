<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Employee Model
 *
 * @property \App\Model\Table\EmployeeReviewTable|\Cake\ORM\Association\BelongsToMany $EmployeeReview
 * @property \App\Model\Table\ReviewTable|\Cake\ORM\Association\BelongsToMany $Review
 *
 * @method \App\Model\Entity\Employee get($primaryKey, $options = [])
 * @method \App\Model\Entity\Employee newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Employee[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Employee|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Employee|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Employee patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Employee[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Employee findOrCreate($search, callable $callback = null, $options = [])
 */
class EmployeeTable extends Table
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

        $this->setTable('employee');
        $this->setDisplayField('id_User');
        $this->setPrimaryKey('id_User');

        $this->belongsToMany('EmployeeReview', [
            'foreignKey' => 'employee_id',
            'targetForeignKey' => 'employee_review_id',
            'joinTable' => 'employee_employee_review'
        ]);
        $this->belongsToMany('Review', [
            'foreignKey' => 'employee_id',
            'targetForeignKey' => 'review_id',
            'joinTable' => 'employee_review'
        ]);
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
            ->scalar('First_name')
            ->maxLength('First_name', 255)
            ->allowEmptyString('First_name');

        $validator
            ->scalar('Last_name')
            ->maxLength('Last_name', 255)
            ->allowEmptyString('Last_name');

        $validator
            ->integer('id_User')
            ->allowEmptyString('id_User', 'create');

        return $validator;
    }
}
