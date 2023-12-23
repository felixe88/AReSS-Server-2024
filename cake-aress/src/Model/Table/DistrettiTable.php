<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Distretti Model
 *
 * @method \App\Model\Entity\Distretti newEmptyEntity()
 * @method \App\Model\Entity\Distretti newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Distretti[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Distretti get($primaryKey, $options = [])
 * @method \App\Model\Entity\Distretti findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Distretti patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Distretti[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Distretti|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Distretti saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Distretti[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Distretti[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Distretti[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Distretti[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DistrettiTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('distretti');

        $this->setPrimaryKey('IDDistretto');


        $this->belongsTo('Asl', [
            'foreignKey' => 'IDAsl',
        ]);

        $this->hasMany('Comuni', [
            'foreignKey' => 'IDDistretto',
        ]);

    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('IDDistretto')
            ->allowEmptyString('IDDistretto');

        $validator
            ->scalar('Descrizione')
            ->maxLength('Descrizione', 22)
            ->allowEmptyString('Descrizione');

        $validator
            ->integer('IDAsl')
            ->allowEmptyString('IDAsl');

        $validator
            ->integer('CapSede')
            ->allowEmptyString('CapSede');

        $validator
            ->scalar('ProvinciaSigla')
            ->maxLength('ProvinciaSigla', 2)
            ->allowEmptyString('ProvinciaSigla');

        return $validator;
    }
}
