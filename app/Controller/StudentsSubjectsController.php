<?php
App::uses('AppController', 'Controller');
/**
 * StudentsSubjects Controller
 *
 * @property StudentsSubject $StudentsSubject
 * @property PaginatorComponent $Paginator
 */
class StudentsSubjectsController extends AppController {

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
		$this->StudentsSubject->recursive = 0;
		$this->Prg->commonProcess(null,array('paramType'=>'querystring'));
		$this->Paginator->settings = array(
				
				'StudentsSubject'=>array(
				'limit' => 60,	
				'paramType'=>'querystring',
				'conditions'=>$this->StudentsSubject->parseCriteria($this->Prg->parsedParams())
    ));
		$this->set('studentsSubjects', $this->Paginator->paginate());
	}
	public function search() {
  if ($this->request->is('put') || $this->request->is('post')) {
    // poor man's Post Redirect Get behavior
    return $this->redirect(array(
      '?' => array(
        'q' => $this->request->data('StudentsSubject.searchQuery')
      )
    ));
  }
  $this->StudentsSubject->recursive = 0;
  $searchQuery = $this->request->query('q');
  $this->Paginator->settings = array(
    'StudentsSubject' => array(
			'order' => array('StudentsSubjects.id' => 'asc'),
      'limit' => 50,
      'findType' => 'search',
      'searchQuery' => $searchQuery
    )
  );
  $this->set('studentsSubjects', $this->Paginator->paginate());
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
		if (!$this->StudentsSubject->exists($id)) {
			throw new NotFoundException(__('Invalid students subject'));
		}
		$this->StudentsSubject->recursive = 2;
		$options = array('conditions' => array('StudentsSubject.' . $this->StudentsSubject->primaryKey => $id));
		$this->set('studentsSubject', $this->StudentsSubject->find('first', $options));
	}

	public function colocacao() {	
		$sql = "SELECT *, COUNT(obs) AS qtd_se,COUNT(notafinal) AS qtd_nota, AVG(notafinal) AS media FROM students_subjects AS StudentsSubject INNER JOIN students AS Student ON Student.id = StudentsSubject.STUDENT_id GROUP BY Student.id order by qtd_se asc,media desc,antiguidade";
		$studentsSubjects = $this->StudentsSubject->query($sql); 
		$this->set(compact('studentsSubjects'));
	}
	
	public function fotosturma() {	
		$sql = "SELECT *, COUNT(obs) AS qtd_se,COUNT(notafinal) AS qtd_nota, AVG(notafinal) AS media FROM students_subjects AS StudentsSubject INNER JOIN students AS Student ON Student.id = StudentsSubject.STUDENT_id GROUP BY Student.id order by qtd_se asc,media desc,antiguidade";
		$studentsSubjects = $this->StudentsSubject->query($sql); 
		$this->set(compact('studentsSubjects'));
	}
	
	public function colocacao_pdf() {	
		ini_set('memory_limit', '512M');
		$sql = "SELECT *, COUNT(obs) AS qtd_se,COUNT(notafinal) AS qtd_nota, AVG(notafinal) AS media FROM students_subjects AS StudentsSubject INNER JOIN students AS Student ON Student.id = StudentsSubject.STUDENT_id GROUP BY Student.id order by qtd_se asc,media desc,antiguidade";
		$studentsSubjects = $this->StudentsSubject->query($sql); 
		$this->set(compact('studentsSubjects'));
		
	}
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StudentsSubject->create();
			if ($this->StudentsSubject->save($this->request->data)) {
				$this->Flash->success(__('A nota foi salva.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('A nota não foi salva.'));
			}
		}
		$subjects = $this->StudentsSubject->Subject->find('list');
		$students = $this->StudentsSubject->Student->find('list');
		$this->set(compact('subjects', 'students'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->StudentsSubject->exists($id)) {
			throw new NotFoundException(__('Invalid students subject'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->StudentsSubject->save($this->request->data)) {
							////////////////////////////////////////////////
							$nota = $this->request->data['StudentsSubject']['nota'];
							$trabalho = $this->request->data['StudentsSubject']['trabalho'];
							$recuperacao = $this->request->data['StudentsSubject']['recuperacao'];
							//pr($notafinal); exit;
							if($nota > 5){
											if (!empty($trabalho)) {
												$this->StudentsSubject->saveField('notafinal', ($nota + $trabalho)/2);
											}else{
												$this->StudentsSubject->saveField('notafinal', $nota);
											}																
							}else{
							$this->StudentsSubject->saveField('notafinal', $recuperacao);	
							$this->StudentsSubject->saveField('obs', "SE");	
							}
							//$this->StudentsSubject->saveField('notafinal', $nota + $trabalho + $recuperacao);
							///////////////////////////////////////////////////array('data' =>$this->request->data
				$this->Flash->success(__('A nota foi salva.'));
				return $this->redirect(array('controller'=>'subjects','action' => 'view',$id = $this->request->data['StudentsSubject']['subject_id']));
			} else {
				$this->Flash->error(__('The students subject could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StudentsSubject.' . $this->StudentsSubject->primaryKey => $id));
			$this->request->data = $this->StudentsSubject->find('first', $options);
		}
		
		$subjects = $this->StudentsSubject->Subject->find('list');
		$students = $this->StudentsSubject->Student->find('list');
		$this->set(compact('subjects', 'students'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->StudentsSubject->id = $id;
		if (!$this->StudentsSubject->exists()) {
			throw new NotFoundException(__('Invalid students subject'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->StudentsSubject->delete()) {
			$this->Flash->success(__('The students subject has been deleted.'));
		} else {
			$this->Flash->error(__('The students subject could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
