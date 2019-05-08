<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SpecialOffers Model
 *
 * @method \App\Model\Entity\SpecialOffer get($primaryKey, $options = [])
 * @method \App\Model\Entity\SpecialOffer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SpecialOffer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SpecialOffer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SpecialOffer|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SpecialOffer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SpecialOffer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SpecialOffer findOrCreate($search, callable $callback = null, $options = [])
 */
class SpecialOffersTable extends Table
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

        $this->setTable('special_offers');
        $this->setDisplayField('id_Special_offers');
        $this->setPrimaryKey('id_Special_offers');
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
            ->scalar('Name')
            ->maxLength('Name', 255)
            ->allowEmptyString('Name', false);

        $validator
            ->numeric('Price')
            ->allowEmptyString('Price', false);

        $validator
            ->date('Date_from')
            ->allowEmptyDate('Date_from', false);

        $validator
            ->date('Date_to')
            ->allowEmptyDate('Date_to', false);

        $validator
            ->integer('id_Special_offers')
            ->allowEmptyString('id_Special_offers', 'create');

        return $validator;
    }
}
