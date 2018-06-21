<?php
App::uses('AppController', 'Controller');
/**
 * Subjects Controller
 *
 * @property Subject $Subject
 * @property PaginatorComponent $Paginator
 */
class SubjectsController extends AppController {

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
		$this->Paginator->settings = array(
        'limit' => 30,
        'order'=>array('Subject.prazofinal'=>'desc')
    );
		$this->Subject->recursive = 0;
    $this->Prg->commonProcess(null,array('paramType'=>'querystring'));
		$this->Paginator->settings = array(
				'Subject'=>array(
				'paramType'=>'querystring',
        'order'=>array('Subject.prazofinal'=>'asc'),  
				'conditions'=>$this->Subject->parseCriteria($this->Prg->parsedParams())
    ));
		$this->set('subjects', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Subject->exists($id)) {
			throw new NotFoundException(__('Invalid subject'));
		}
		$this->Subject->recursive = 2;
		$options = array('conditions' => array('Subject.' . $this->Subject->primaryKey => $id));
		$this->set('subject', $this->Subject->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id=null) {
		if ($this->request->is('post')) {
			$this->Subject->create();
			if ($this->Subject->save($this->request->data)) {
				///////////////////PRAZO//////////////////////////
          ///$this->Subject->deconstruct  The way to convert that array to date object is as following:
          $timeArray = $this->request->data['Subject']['recebimento']; 
          $recebimento = $this->Subject->deconstruct('recebimento', $timeArray);
        
          $qtd_dias = $this->request->data['Subject']['cargahoraria'];
          
          $prazofinal = date('Y-m-d', strtotime("+$qtd_dias days",strtotime($recebimento)));  
          $prazolimite = date('Y-m-d', strtotime("-3 days",strtotime($prazofinal)));  
        
          $this->Subject->saveField('prazofinal',$prazofinal);
          $this->Subject->saveField('prazolimite',$prazolimite);
        ////////////////////////////////////////////
				$subject['course_id']=$id;
				$this->Subject->saveField('course_id',$id);
        
				////
				$this->Flash->success(__('Procedimento salvo.'));
				return $this->redirect(array('controller'=>'courses','action' => 'view',$id));
			} else {
				$this->Flash->error(__('The subject could not be saved. Please, try again.'));
			}
		}
		$courses = $this->Subject->Course->find('list');
		$students = $this->Subject->Student->find('list');
		$this->set(compact('courses', 'students'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Subject->exists($id)) {
			throw new NotFoundException(__('Invalid subject'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Subject->save($this->request->data)) {
        ///////////////////PRAZO//////////////////////////
          ///$this->Subject->deconstruct  The way to convert that array to date object is as following:
          $timeArray = $this->request->data['Subject']['recebimento']; 
          $recebimento = $this->Subject->deconstruct('recebimento', $timeArray);
        
          $qtd_dias = $this->request->data['Subject']['cargahoraria'];
          
          $prazofinal = date('Y-m-d', strtotime("+$qtd_dias days",strtotime($recebimento)));  
          $prazolimite = date('Y-m-d', strtotime("-3 days",strtotime($prazofinal)));  
        
          $this->Subject->saveField('prazofinal',$prazofinal);
          $this->Subject->saveField('prazolimite',$prazolimite);
        ////////////////////////////////////////////
				$this->Flash->success(__('Procedimento salvo.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The subject could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Subject.' . $this->Subject->primaryKey => $id));
			$this->request->data = $this->Subject->find('first', $options);
		}
		$courses = $this->Subject->Course->find('list');
		$students = $this->Subject->Student->find('list');
		$this->set(compact('courses', 'students'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Subject->id = $id;
		if (!$this->Subject->exists()) {
			throw new NotFoundException(__('Invalid subject'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Subject->delete()) {
			$this->Flash->success(__('The subject has been deleted.'));
		} else {
			$this->Flash->error(__('The subject could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('controller'=>'subjects','action' => 'index'));
	}
}
