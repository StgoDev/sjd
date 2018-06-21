<?php
App::uses('AppModel', 'Model');
/**
 * Student Model
 *
 * @property Room $Room
 * @property Course $Course
 * @property Subject $Subject
 */
class Student extends AppModel {
public $displayField = 'nome';
public $actsAs = array(
				'Search.Searchable',
        'Upload.Upload' => array(
            'foto' => array(
                'fields' => array(
                    'dir' => 'foto_dir'
                ),
                'thumbnailMethod'  => 'php',
                'thumbnailSizes' => array(
                	'vga' => '640x480',
                	'thumb' => '150x200'
                ),
                'deleteOnUpdate' => true,
                'deleteFolderOnDelete' => true
            )
        )
    );
public $filterArgs = array(
    'nome' => array('type' => 'like', 'field' => array('Student.nome')),  
		'room' => array('type' => 'like', 'field' => array('Student.room_id')), 
);	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		
		'nome' => array(
			'notempty' => array(
				'rule' => array('notBlank'),
				'message' => 'Adicione o nome do aluno',
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
				"{$this->alias}.nome LIKE" => '%' . $searchQuery . '%',
				"{$this->alias}.rg LIKE" => '%' . $searchQuery . '%'
				)
				);
				$query['conditions'] = array_merge($searchConditions, 
				(array)$query['conditions']);
				return $query;
				}
				return $results;
		}
	public $belongsTo = array(
		'Room' => array(
			'className' => 'Room',
			'foreignKey' => 'room_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
public $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'student_id',
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
		'Course' => array(
			'className' => 'Course',
			'joinTable' => 'students_courses',
			'foreignKey' => 'student_id',
			'associationForeignKey' => 'course_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Subject' => array(
			'className' => 'Subject',
			'joinTable' => 'students_subjects',
			'foreignKey' => 'student_id',
			'associationForeignKey' => 'subject_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => 'Subject.nomedisciplina ASC',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);
	
	function checkUniqueName($data)
	{
	    $isUnique = $this->find('first', array('fields' => array('Student.foto'), 'conditions' => array('Student.foto' => $data['foto'])));

	    if(!empty($isUnique))
	    {
	        return false;
	    }
	    else
	    {
	        return true;
	    }
	}
	/**
 * Transforms the data array to save the HABTM relation
 */
	public function beforeSave($options = array()){
		foreach (array_keys($this->hasAndBelongsToMany) as $model){
			if(isset($this->data[$this->name][$model])){
				$this->data[$model][$model] = $this->data[$this->name][$model];
				unset($this->data[$this->name][$model]);
			}
		}
		return true;
	}

}
