<?php
App::uses('AppModel', 'Model');
/**
 * Report Model
 *
 * @property Subject $Subject
 */
class Report extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	
	public $validate = array(
    'report' => array(      
            'rule'    => array(
            'extension',array('pdf')),
            'message' => 'Please upload pdf file only'
    ),
    'subject_id' => array(
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
public $findMethods = array('search' => true);
protected function _findSearch($state, $query, $results = array()) 
{
if ($state === 'before') {
$searchQuery = Hash::get($query, 'searchQuery');
$searchConditions = array(
  'or' => array(
  	"Subject.nomedisciplina LIKE" => '%' . $searchQuery . '%',
  	"Subject.nomeprofessor LIKE" => '%' . $searchQuery . '%',
    "{$this->alias}.titulo LIKE" => '%' . $searchQuery . '%',
    "{$this->alias}.descricao LIKE" => '%' . $searchQuery . '%'
  )
);
$query['conditions'] = array_merge($searchConditions, 
(array)$query['conditions']);
return $query;
}
return $results;
}
	
	public $hasMany = array(
		'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'report_id',
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


	public $belongsTo = array(
		'Subject' => array(
			'className' => 'Subject',
			'foreignKey' => 'subject_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
