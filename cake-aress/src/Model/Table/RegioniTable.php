<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Regioni Model
 *
 * @method \App\Model\Entity\Regioni newEmptyEntity()
 * @method \App\Model\Entity\Regioni newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Regioni[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Regioni get($primaryKey, $options = [])
 * @method \App\Model\Entity\Regioni findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Regioni patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Regioni[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Regioni|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Regioni saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Regioni[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Regioni[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Regioni[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Regioni[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class RegioniTable extends Table
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

        $this->setPrimaryKey('Descrizione');


        $this->setTable('regioni');

        $this->belongsTo('Asl', [
            'foreignKey' => 'IDRegione',
            'joinType' => 'INNER', // Opzionale, specifica il tipo di join (INNER, LEFT, RIGHT, FULL)
            'className' => 'Asl' // Specifica il nome del modello associato
        // $this->hasMany('Asl', [
        //     'foreignKey' => 'IDRegione',
        //     'propertyName' => 'Asl'
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
            ->integer('IDRegione')
            ->allowEmptyString('IDRegione');

        $validator
            ->scalar('Descrizione')
            ->maxLength('Descrizione', 6)
            ->allowEmptyString('Descrizione');

        return $validator;
    }
}
