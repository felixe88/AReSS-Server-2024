<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Comuni Model
 *
 * @method \App\Model\Entity\Comuni newEmptyEntity()
 * @method \App\Model\Entity\Comuni newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Comuni[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Comuni get($primaryKey, $options = [])
 * @method \App\Model\Entity\Comuni findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Comuni patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Comuni[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Comuni|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Comuni saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Comuni[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Comuni[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Comuni[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Comuni[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ComuniTable extends Table
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

        $this->setPrimaryKey('IDComune');

        $this->belongsTo('Distretti', [
            'foreignKey' => 'IDDistretto',
        ]);

        $this->belongsTo('Asl', [
            'foreignKey' => 'IDAsl',
        ]);

        $this->belongsTo('ComunePopolazioneTumoriTest', [
            'foreignKey' => 'IDComune',
        ]);

        $this->setTable('comuni');
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
            ->integer('IDComune')
            ->allowEmptyString('IDComune');

        $validator
            ->scalar('Descrizione')
            ->maxLength('Descrizione', 27)
            ->allowEmptyString('Descrizione');

        $validator
            ->integer('IDDistretto')
            ->allowEmptyString('IDDistretto');

        return $validator;
    }
}
