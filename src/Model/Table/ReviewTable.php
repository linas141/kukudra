<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Review Model
 *
 * @method \App\Model\Entity\Review get($primaryKey, $options = [])
 * @method \App\Model\Entity\Review newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Review[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Review|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Review|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Review patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Review[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Review findOrCreate($search, callable $callback = null, $options = [])
 */
class ReviewTable extends Table
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
			->setForeignKey('fk_Userid_User');
		$this->hasMany('employee_review')
			->setForeignKey('id_Review');
		$this->hasMany('enviroment_review')
			->setForeignKey('id_Review');
		$this->hasMany('food_review')
			->setForeignKey('id_Review');

        $this->setTable('review');
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
            ->scalar('Review')
            ->maxLength('Review', 255)
            ->allowEmptyString('Review');

        $validator
            ->integer('id_Review')
            ->allowEmptyString('id_Review', 'create');

        $validator
            ->integer('fk_Userid_User')
            ->requirePresence('fk_Userid_User', 'create')
            ->allowEmptyString('fk_Userid_User', false);

        $validator
            ->date('datePublished')
            ->allowEmptyDate('datePublished', false);

        $validator
            ->integer('rating')
            ->allowEmptyString('rating', false);

        return $validator;
    }
}
