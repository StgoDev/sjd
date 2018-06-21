<?php
App::uses('AppModel', 'Model');
/**
 * StudentsSubject Model
 *
 * @property Subject $Subject
 * @property Student $Student
 */
class StudentsSubject extends AppModel {
public $actsAs = array(
				'Search.Searchable'
    );
public $filterArgs = array(
    'subject' => array('type' => 'like', 'field' => array('Subject.nomedisciplina')),  
		'student' => array('type' => 'like', 'field' => array('Student.nome')), 
);	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'subject_id' => array(
        'rule' => array('isUnique', array('subject_id', 'student_id'), false),
        'message' => 'Esta nota já esta cadastrada no sistema.'
    ),
		//'subject_id' => array(
			//'numeric' => array(
				//'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			//),
		//),
		'student_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'nota' => array(
			'numeric' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'trabalho' => array(
			'numeric' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'recuperacao' => array(
			'numeric' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'notafinal' => array(
			'numeric' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
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
	
	public $findMethods = array('search' => true);
		protected function _findSearch($state, $query, $results = array()) 
		{
				if ($state === 'before') {
				$searchQuery = Hash::get($query, 'searchQuery');
				$searchConditions = array(
				'or' => array(
				"Student.nome LIKE" => '%' . $searchQuery . '%',
				"Student.rg LIKE" => '%' . $searchQuery . '%',	
				"Subject.nomedisciplina LIKE" => '%' . $searchQuery . '%'
				)
				);
				$query['conditions'] = array_merge($searchConditions, 
				(array)$query['conditions']);
				return $query;
				}
				return $results;
		}
	
	
	public $belongsTo = array(
		'Subject' => array(
			'className' => 'Subject',
			'foreignKey' => 'subject_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Student' => array(
			'className' => 'Student',
			'foreignKey' => 'student_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
