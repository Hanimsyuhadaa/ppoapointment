<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Appoinments Model
 *
 * @property \App\Model\Table\StaffsTable&\Cake\ORM\Association\BelongsTo $Staffs
 * @property \App\Model\Table\DepartmentsTable&\Cake\ORM\Association\BelongsTo $Departments
 *
 * @method \App\Model\Entity\Appoinment newEmptyEntity()
 * @method \App\Model\Entity\Appoinment newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Appoinment> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Appoinment get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Appoinment findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Appoinment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Appoinment> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Appoinment|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Appoinment saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Appoinment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Appoinment>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Appoinment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Appoinment> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Appoinment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Appoinment>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Appoinment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Appoinment> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AppoinmentsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('appoinments');
        $this->setDisplayField('status');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Staffs', [
            'foreignKey' => 'staff_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Departments', [
            'foreignKey' => 'department_id',
            'joinType' => 'INNER',
        ]);
		$this->addBehavior('AuditStash.AuditLog');
		$this->addBehavior('Search.Search');
		$this->searchManager()
			->value('id')
				->add('search', 'Search.Like', [
					//'before' => true,
					//'after' => true,
					'fieldMode' => 'OR',
					'multiValue' => true,
					'multiValueSeparator' => '|',
					'comparison' => 'LIKE',
					'wildcardAny' => '*',
					'wildcardOne' => '?',
					'fields' => ['id'],
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
        // $validator
        //     ->integer('staff_id')
        //     ->notEmptyString('staff_id')
        //     ->add('staff_id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        // $validator
        //     ->integer('department_id')
        //     ->notEmptyString('department_id')
        //     ->add('department_id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        // $validator
        //     ->date('start_date')
        //     ->requirePresence('start_date', 'create')
        //     ->notEmptyDate('start_date');

        // $validator
        //     ->date('end_date')
        //     ->requirePresence('end_date', 'create')
        //     ->notEmptyDate('end_date');

        // $validator
        //     ->scalar('status')
        //     ->maxLength('status', 255)
        //     ->requirePresence('status', 'create')
        //     ->notEmptyString('status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['staff_id']), ['errorField' => 'staff_id']);
        $rules->add($rules->isUnique(['department_id']), ['errorField' => 'department_id']);
        $rules->add($rules->existsIn(['staff_id'], 'Staffs'), ['errorField' => 'staff_id']);
        $rules->add($rules->existsIn(['department_id'], 'Departments'), ['errorField' => 'department_id']);

        return $rules;
    }
}
