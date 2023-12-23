<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CronicitaScompensoCardiacoCasi Model
 *
 * @method \App\Model\Entity\CronicitaScompensoCardiacoCasi newEmptyEntity()
 * @method \App\Model\Entity\CronicitaScompensoCardiacoCasi newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CronicitaScompensoCardiacoCasi[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CronicitaScompensoCardiacoCasi get($primaryKey, $options = [])
 * @method \App\Model\Entity\CronicitaScompensoCardiacoCasi findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CronicitaScompensoCardiacoCasi patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CronicitaScompensoCardiacoCasi[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CronicitaScompensoCardiacoCasi|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CronicitaScompensoCardiacoCasi saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CronicitaScompensoCardiacoCasi[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CronicitaScompensoCardiacoCasi[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CronicitaScompensoCardiacoCasi[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CronicitaScompensoCardiacoCasi[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CronicitaScompensoCardiacoCasiTable extends Table
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

        $this->setTable('cronicita_scompenso_cardiaco_casi');
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
