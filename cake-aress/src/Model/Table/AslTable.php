<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Asl Model
 *
 * @method \App\Model\Entity\Asl newEmptyEntity()
 * @method \App\Model\Entity\Asl newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Asl[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Asl get($primaryKey, $options = [])
 * @method \App\Model\Entity\Asl findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Asl patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Asl[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Asl|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Asl saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Asl[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Asl[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Asl[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Asl[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AslTable extends Table
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

        $this->setPrimaryKey('IDAsl');


        $this->setTable('asl');

        // $this->belongsTo('Regioni', [
        //     'foreignKey' => 'IDRegione',
        //     'joinType' => 'INNER'
        // ]);

        $this->hasMany('Distretti', [
            'foreignKey' => 'IDAsl',
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
            ->integer('IDAsl')
            ->allowEmptyString('IDAsl');

        $validator
            ->scalar('Descrizione')
            ->maxLength('Descrizione', 8)
            ->allowEmptyString('Descrizione');

        $validator
            ->integer('IDRegione')
            ->allowEmptyString('IDRegione');

        return $validator;
    }
}
