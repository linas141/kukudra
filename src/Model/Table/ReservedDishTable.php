<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ReservedDish Model
 *
 * @property \App\Model\Table\DishTable|\Cake\ORM\Association\BelongsTo $Dish
 *
 * @method \App\Model\Entity\ReservedDish get($primaryKey, $options = [])
 * @method \App\Model\Entity\ReservedDish newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ReservedDish[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ReservedDish|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ReservedDish|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ReservedDish patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ReservedDish[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ReservedDish findOrCreate($search, callable $callback = null, $options = [])
 */
class ReservedDishTable extends Table
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
		$this->belongsTo('Reservation')
			->setForeignKey('Number');
		$this->belongsTo('Dish')
			->setForeignKey('fk_dish_id');

        $this->setTable('reserved_dish');
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
            ->integer('Number')
			->requirePresence('Number', 'create')
            ->allowEmptyString('Number', false);;
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

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
        $rules->add($rules->existsIn(['fk_dish_id'], 'Dish'));

        return $rules;
    }
}
