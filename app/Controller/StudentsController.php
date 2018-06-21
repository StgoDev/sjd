<?php
App::uses('AppController', 'Controller');
/**
 * Students Controller
 *
 * @property Student $Student
 * @property PaginatorComponent $Paginator
 */
class StudentsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','Search.Prg','RequestHandler');
	
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Student->recursive = 0;
		$this->Prg->commonProcess(null,array('paramType'=>'querystring'));
		$this->Paginator->settings = array(
				'Student'=>array(
				'paramType'=>'querystring',
				'conditions'=>$this->Student->parseCriteria($this->Prg->parsedParams())
    ));
		$this->set('students', $this->Paginator->paginate());
	}
	public function search() {
  if ($this->request->is('put') || $this->request->is('post')) {
    // poor man's Post Redirect Get behavior
    return $this->redirect(array(
      '?' => array(
        'q' => $this->request->data('Student.searchQuery')
      )
    ));
  }
  $this->Student->recursive = 0;
  $searchQuery = $this->request->query('q');
  $this->Paginator->settings = array(
    'Student' => array(
			'order' => array('Student.nome' => 'asc'),
      'limit' => 30,
      'findType' => 'search',
      'searchQuery' => $searchQuery
    )
  );
  $this->set('students', $this->Paginator->paginate());
  $this->set('searchQuery', $searchQuery);
  $this->render('index');
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Student->exists($id)) {
			throw new NotFoundException(__('Invalid student'));
		}
		$this->Student->recursive = 2;
		$options = array('conditions' => array('Student.' . $this->Student->primaryKey => $id));
		$this->set('student', $this->Student->find('first', $options));
	}
	
	public function view_record($id = null) {
		$id = $this->Auth->user('student_id');
		if (!$this->Student->exists($id)) {
			throw new NotFoundException(__('Invalid student'));
		}
		$this->Student->recursive = 2;
		$options = array('conditions' => array('Student.' . $this->Student->primaryKey => $id));
		$this->set('student', $this->Student->find('first', $options));
	}

	public function boletim_pdf($id = null) {
		ini_set('memory_limit', '512M');
		$id = $this->Auth->user('student_id');
		if (!$this->Student->exists($id)) {
			throw new NotFoundException(__('Invalid student'));
		}
		$this->Student->recursive = 2;
		$options = array('conditions' => array('Student.' . $this->Student->primaryKey => $id));
		$this->set('student', $this->Student->find('first', $options));
	}
	public function certificado_pdf($id = null) {
		ini_set('memory_limit', '512M');
		$id = $this->Auth->user('student_id');
		if (!$this->Student->exists($id)) {
			throw new NotFoundException(__('Invalid student'));
		}
		$this->Student->recursive = 2;
		$options = array('conditions' => array('Student.' . $this->Student->primaryKey => $id));
		$this->set('student', $this->Student->find('first', $options));
	}
	
	
	
	public function boletimadm_pdf($id = null) {
		ini_set('memory_limit', '512M');
		if (!$this->Student->exists($id)) {
			throw new NotFoundException(__('Invalid student'));
		}
		$this->Student->recursive = 2;
		$options = array('conditions' => array('Student.' . $this->Student->primaryKey => $id));
		$this->set('student', $this->Student->find('first', $options));
	}
	public function certificadoadm_pdf($id = null) {
		ini_set('memory_limit', '512M');
		if (!$this->Student->exists($id)) {
			throw new NotFoundException(__('Invalid student'));
		}
		$this->Student->recursive = 2;
		$options = array('conditions' => array('Student.' . $this->Student->primaryKey => $id));
		$this->set('student', $this->Student->find('first', $options));
	}
/**
 * add method
 *
 * @return void
 */
	public function add($id=null,$ad=null) {
		if ($this->request->is('post')) {
			$this->Student->create();
			if ($this->Student->save($this->request->data)) {
				////
        $this->request->data['StudentsCourse']['course_id'] = $id;
        //$this->request->data['Student']['Course'][] = $id;
        $this->Student->Course->save($this->request->data);
        $this->request->data['StudentsSubject']['subject_id'] = $ad;
        //$this->request->data['Student']['Subject'][] = $ad;
        $this->Student->Subject->save($this->request->data);
				////
				$this->Flash->success(__('The student has been saved.'));
				return $this->redirect(array('controller'=>'subjects','action' => 'view',$ad));
			} else {
				$this->Flash->error(__('The student could not be saved. Please, try again.'));
			}
		}
		
		$rooms = $this->Student->Room->find('list',array('conditions'=>array('Room.course_id'=>$id)));
		$courses = $this->Student->Course->find('list',array('conditions'=>array('Course.id'=>$id)));
		$subjects = $this->Student->Subject->find('list',array('conditions'=>array('Subject.id'=>$ad)));
		$this->set(compact('rooms', 'courses', 'subjects'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Student->exists($id)) {
			throw new NotFoundException(__('Invalid student'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Student->save($this->request->data)) {
				$this->Flash->success(__('The student has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The student could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Student.' . $this->Student->primaryKey => $id));
			$this->request->data = $this->Student->find('first', $options);
		}
		
		$rooms = $this->Student->Room->find('list');
		$courses = $this->Student->Course->find('list');
		$subjects = $this->Student->Subject->find('list');
		$this->set(compact('rooms', 'courses', 'subjects'));
	}
	public function editar($id = null) {
		$id = $this->Auth->user('student_id');
		if (!$this->Student->exists($id)) {
			throw new NotFoundException(__('Invalid student'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Student->save($this->request->data)) {
				$this->Flash->success(__('The student has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The student could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Student.' . $this->Student->primaryKey => $id));
			$this->request->data = $this->Student->find('first', $options);
		}
		
		$rooms = $this->Student->Room->find('list');
		$courses = $this->Student->Course->find('list');
		$subjects = $this->Student->Subject->find('list');
		$this->set(compact('rooms', 'courses', 'subjects'));
	}
/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null,$course=null) {
		$this->Student->id = $id;
		if (!$this->Student->exists()) {
			throw new NotFoundException(__('Invalid student'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Student->delete()) {
			$this->Flash->success(__('The student has been deleted.'));
		} else {
			$this->Flash->error(__('The student could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('controller'=>'courses','action' => 'view',$course));
	}
}
