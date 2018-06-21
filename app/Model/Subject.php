<?php
App::uses('AppModel', 'Model');
/**
 * Subject Model
 *
 * @property Course $Course
 * @property Report $Report
 * @property Student $Student
 */
class Subject extends AppModel {
public $displayField = 'nomedisciplina';
  
public $actsAs = array(
				'Search.Searchable'
    );
public $filterArgs = array(
    'course' => array('type' => 'like', 'field' => array('Course.nomecurso')), 
		'nomedisciplina' => array('type' => 'like', 'field' => array('Subject.nomedisciplina')) 
); 
public $findMethods = array('search' => true);
		protected function _findSearch($state, $query, $results = array()) 
		{
				if ($state === 'before') {
				$searchQuery = Hash::get($query, 'searchQuery');
				$searchConditions = array(
				'or' => array(
        "Course.nomecurso LIKE" => '%' . $searchQuery . '%',
        "{$this->alias}.nomedisciplina LIKE" => '%' . $searchQuery . '%'  
				)
				);
				$query['conditions'] = array_merge($searchConditions, 
				(array)$query['conditions']);
				return $query;
				}
				return $results;
		}  
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'course_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Course' => array(
			'className' => 'Course',
			'foreignKey' => 'course_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Report' => array(
			'className' => 'Report',
			'foreignKey' => 'subject_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Student' => array(
			'className' => 'Student',
			'joinTable' => 'students_subjects',
			'foreignKey' => 'subject_id',
			'associationForeignKey' => 'student_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => 'Student.antiguidade ASC',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
