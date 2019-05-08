<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * User Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UserTable extends Table
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
		$this->hasMany('DaysOff')
			->setForeignKey('id_User');
		$this->hasMany('Review')
			->setForeignKey('id_User');
		$this->hasMany('employee_review')
			->setForeignKey('id_User');

        $this->setTable('user');
        $this->setDisplayField('id_User');
        $this->setPrimaryKey('id_User');

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
            ->scalar('username')
            ->maxLength('username', 255)
            ->requirePresence('username', 'create')
            ->allowEmptyString('username', false)
            ->add('username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message'=>'Vartotojo vardas užimtas'])
			->add('username', 'length', ['rule' => ['minLength', 6], 'message'=>'Vartotojo vardas per trumpas!']);

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->allowEmptyString('password', false, 'Slaptažodis negali būti tuščias!')
			->add('password', 'length', ['rule' => ['minLength', 6], 'message'=>'Slaptažodis per trumpas!']);

        $validator
            ->scalar('First_name')
            ->maxLength('First_name', 255)
            ->allowEmptyString('First_name');

        $validator
            ->scalar('Last_name')
            ->maxLength('Last_name', 255)
            ->allowEmptyString('Last_name');

        $validator
            ->decimal('Phone_nr')
            ->allowEmptyString('Phone_nr')
			->add('Phone_nr', 'decimal', ['rule' => 'decimal', 'message'=>'Į numerio laukelį galite vesti tik skaičių!']);
			
        $validator
            ->integer('id_User')
            ->allowEmptyString('id_User', 'create');

        $validator
            ->scalar('role')
            ->maxLength('role', 255)
            ->allowEmptyString('role', false, 'Rolė negali būti tuščia!');

        $validator
            ->scalar('Last_IP')
            ->maxLength('Last_IP', 255)
            ->allowEmptyString('Last_IP');
      
		$validator
            ->scalar('token')
            ->maxLength('token', 255)
            ->allowEmptyString('token');

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
        $rules->add($rules->isUnique(['username']));

        return $rules;
    }
}
