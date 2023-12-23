<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Classi Model
 *
 * @method \App\Model\Entity\Classi newEmptyEntity()
 * @method \App\Model\Entity\Classi newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Classi[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Classi get($primaryKey, $options = [])
 * @method \App\Model\Entity\Classi findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Classi patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Classi[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Classi|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Classi saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Classi[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Classi[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Classi[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Classi[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ClassiTable extends Table
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

        $this->setTable('classi');

        $this->setPrimaryKey('IDClasse');

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
            ->integer('IDClasse')
            ->allowEmptyString('IDClasse');

        $validator
            ->scalar('classe_eta')
            ->maxLength('classe_eta', 5)
            ->allowEmptyString('classe_eta');

        $validator
            ->integer('peso_eu')
            ->allowEmptyString('peso_eu');

        $validator
            ->scalar('Gruppo_Tumori')
            ->maxLength('Gruppo_Tumori', 5)
            ->allowEmptyString('Gruppo_Tumori');

        $validator
            ->scalar('Gruppo_Cronicita')
            ->maxLength('Gruppo_Cronicita', 13)
            ->allowEmptyString('Gruppo_Cronicita');

        return $validator;
    }
}
