<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TumoriLinfomaHodgkinCasi Model
 *
 * @method \App\Model\Entity\TumoriLinfomaHodgkinCasi newEmptyEntity()
 * @method \App\Model\Entity\TumoriLinfomaHodgkinCasi newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TumoriLinfomaHodgkinCasi[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TumoriLinfomaHodgkinCasi get($primaryKey, $options = [])
 * @method \App\Model\Entity\TumoriLinfomaHodgkinCasi findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TumoriLinfomaHodgkinCasi patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TumoriLinfomaHodgkinCasi[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TumoriLinfomaHodgkinCasi|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TumoriLinfomaHodgkinCasi saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TumoriLinfomaHodgkinCasi[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TumoriLinfomaHodgkinCasi[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TumoriLinfomaHodgkinCasi[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TumoriLinfomaHodgkinCasi[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TumoriLinfomaHodgkinCasiTable extends Table
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

        $this->setTable('tumori_linfoma_hodgkin_casi');
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
