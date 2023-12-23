<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TumoriLeucemiaMieloideCronicaCasi Model
 *
 * @method \App\Model\Entity\TumoriLeucemiaMieloideCronicaCasi newEmptyEntity()
 * @method \App\Model\Entity\TumoriLeucemiaMieloideCronicaCasi newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TumoriLeucemiaMieloideCronicaCasi[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TumoriLeucemiaMieloideCronicaCasi get($primaryKey, $options = [])
 * @method \App\Model\Entity\TumoriLeucemiaMieloideCronicaCasi findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TumoriLeucemiaMieloideCronicaCasi patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TumoriLeucemiaMieloideCronicaCasi[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TumoriLeucemiaMieloideCronicaCasi|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TumoriLeucemiaMieloideCronicaCasi saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TumoriLeucemiaMieloideCronicaCasi[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TumoriLeucemiaMieloideCronicaCasi[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TumoriLeucemiaMieloideCronicaCasi[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TumoriLeucemiaMieloideCronicaCasi[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TumoriLeucemiaMieloideCronicaCasiTable extends Table
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

        $this->setTable('tumori_leucemia_mieloide_cronica_casi');
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
            ->integer('IDComunePop')
            ->allowEmptyString('IDComunePop');

        $validator
            ->integer('IDPatologia')
            ->allowEmptyString('IDPatologia');

        $validator
            ->integer('casi')
            ->allowEmptyString('casi');

        return $validator;
    }
}
