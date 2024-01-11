<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Patologie Model
 *
 * @method \App\Model\Entity\Patologie newEmptyEntity()
 * @method \App\Model\Entity\Patologie newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Patologie[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Patologie get($primaryKey, $options = [])
 * @method \App\Model\Entity\Patologie findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Patologie patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Patologie[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Patologie|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Patologie saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Patologie[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Patologie[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Patologie[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Patologie[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PatologieTable extends Table
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

        $this->setTable('patologie');

        $this->setPrimaryKey('IDPatologia');
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
            ->integer('IDPatologia')
            ->allowEmptyString('IDPatologia');

        $validator
            ->scalar('patologia')
            ->maxLength('patologia', 26)
            ->allowEmptyString('patologia');

        $validator
            ->scalar('sezione')
            ->maxLength('sezione', 9)
            ->allowEmptyString('sezione');

        return $validator;
    }
}
