<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Combinazioni Model
 *
 * @method \App\Model\Entity\Combinazioni newEmptyEntity()
 * @method \App\Model\Entity\Combinazioni newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Combinazioni[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Combinazioni get($primaryKey, $options = [])
 * @method \App\Model\Entity\Combinazioni findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Combinazioni patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Combinazioni[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Combinazioni|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Combinazioni saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Combinazioni[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Combinazioni[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Combinazioni[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Combinazioni[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CombinazioniTable extends Table
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

        $this->setTable('combinazioni');
        $this->setDisplayField('comuni');
        $this->setPrimaryKey('id');
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
            ->integer('classe_eta')
            ->requirePresence('classe_eta', 'create')
            ->notEmptyString('classe_eta');

        $validator
            ->scalar('comuni')
            ->maxLength('comuni', 255)
            ->requirePresence('comuni', 'create')
            ->notEmptyString('comuni');

        $validator
            ->integer('anno')
            ->requirePresence('anno', 'create')
            ->notEmptyString('anno');

        $validator
            ->scalar('sesso')
            ->maxLength('sesso', 255)
            ->requirePresence('sesso', 'create')
            ->notEmptyString('sesso');

        $validator
            ->scalar('patologia')
            ->maxLength('patologia', 255)
            ->requirePresence('patologia', 'create')
            ->notEmptyString('patologia');

        return $validator;
    }
}
