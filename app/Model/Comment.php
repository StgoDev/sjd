<?php
App::uses('AppModel', 'Model');
/**
 * Comentario Model
 *
 * @property Noticia $Noticia
 * @property Usuario $Usuario
 */
class Comment extends AppModel {

	public $belongsTo = array(
		'Report' => array(
			'className' => 'Report',
			'foreignKey' => 'report_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
