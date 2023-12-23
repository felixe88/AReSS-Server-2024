<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TumoriReneCasi Model
 *
 * @method \App\Model\Entity\TumoriReneCasi newEmptyEntity()
 * @method \App\Model\Entity\TumoriReneCasi newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TumoriReneCasi[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TumoriReneCasi get($primaryKey, $options = [])
 * @method \App\Model\Entity\TumoriReneCasi findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TumoriReneCasi patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TumoriReneCasi[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TumoriReneCasi|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TumoriReneCasi saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TumoriReneCasi[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TumoriReneCasi[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TumoriReneCasi[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TumoriReneCasi[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TumoriReneCasiTable extends Table
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

        $this->setTable('tumori_rene_casi');
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
