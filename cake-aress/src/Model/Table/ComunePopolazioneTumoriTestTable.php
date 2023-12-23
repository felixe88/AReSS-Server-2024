<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ComunePopolazioneTumoriTest Model
 *
 * @method \App\Model\Entity\ComunePopolazioneTumoriTest newEmptyEntity()
 * @method \App\Model\Entity\ComunePopolazioneTumoriTest newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ComunePopolazioneTumoriTest[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ComunePopolazioneTumoriTest get($primaryKey, $options = [])
 * @method \App\Model\Entity\ComunePopolazioneTumoriTest findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ComunePopolazioneTumoriTest patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ComunePopolazioneTumoriTest[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ComunePopolazioneTumoriTest|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ComunePopolazioneTumoriTest saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ComunePopolazioneTumoriTest[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ComunePopolazioneTumoriTest[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ComunePopolazioneTumoriTest[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ComunePopolazioneTumoriTest[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ComunePopolazioneTumoriTestTable extends Table
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
        $this->setTable('comune_popolazione_tumori_test');

        $this->setPrimaryKey('ID');


        $this->belongsTo('Comuni', [
            'foreignKey' => 'IDComune',
        ]);

        $this->belongsTo('Distretti', [
            'foreignKey' => 'IDDistretto'
        ]);

        $this->belongsTo('Asl', [
            'foreignKey' => 'IDAsl'
        ]);

        $this->belongsTo('Classi', [
            'foreignKey' => 'IDClasse',
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
            ->integer('ID')
            ->allowEmptyString('ID');

        $validator
            ->integer('IDComune')
            ->allowEmptyString('IDComune');

        $validator
            ->integer('IDClasse')
            ->allowEmptyString('IDClasse');

        $validator
            ->integer('anno')
            ->allowEmptyString('anno');

        $validator
            ->scalar('sesso')
            ->maxLength('sesso', 7)
            ->allowEmptyString('sesso');

        $validator
            ->integer('popolazione')
            ->allowEmptyString('popolazione');

        return $validator;
    }

    public function estraiTotale($colonna, $anno)
    {
        return $this->find()
            ->where(['anno' => $anno])
            ->select(['total' => $this->query()->func()->sum($colonna)])
            ->enableHydration(false)
            ->first()['total'];
    }
}
