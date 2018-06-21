<?php
App::uses('AppController', 'Controller');
/**
 * Reports Controller
 *
 * @property Report $Report
 * @property PaginatorComponent $Paginator
 */
class ReportsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public $helpers=array('Html','Form');

  
	public function index() {
		$this->Paginator->settings = array(
        'Report' => array(
            'limit' => 50,
            'order' => array('created' => 'desc'),
        )
    );
		$this->Report->recursive = 0;
		$this->set('reports', $this->Paginator->paginate());
	}

	public function search() {
  if ($this->request->is('put') || $this->request->is('post')) {
    // poor man's Post Redirect Get behavior
    return $this->redirect(array(
      '?' => array(
        'q' => $this->request->data('Report.searchQuery')
      )
    ));
  }
  $this->Report->recursive = 0;
  $searchQuery = $this->request->query('q');
  $this->Paginator->settings = array(
    'Report' => array(
      'findType' => 'search',
      'searchQuery' => $searchQuery
    )
  );
  $this->set('reports', $this->Paginator->paginate());
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
		if (!$this->Report->exists($id)) {
			throw new NotFoundException(__('Invalid report'));
		}
		$comments = $this->Report->Comment->find('all', array(
		'conditions' => array('Comment.report_id' => $id),
		'fields' => array('Comment.comentario', 'Comment.created', 'User.username'),
		'order'=>array('Comment.created' => 'desc')	
		));
		//pr($comments); exit;
		$this->set('allcomments', $comments);
		$this->set('report', $this->Report->read(null, $id));
		//$options = array('conditions' => array('Report.' . $this->Report->primaryKey => $id));
		//$this->set('report', $this->Report->find('first', $options));
	}

	public function viewdown($id=null,$download=false) {
     if($download){
      $download=false;
     }

     $files=$this->Report->findById($id);
      $filename=$files['Report']['report'];
      $name=explode('.',$filename);
     $this->viewClass = 'Media';
     
      // path will be app/outsidefiles/yourfilename.pdf
      $params = array(
            'id'        => $filename,
            'name'      => $name[0],
            'download'  => $download,
            'extension' => 'pdf',
            'path'      => WWW_ROOT . '/files/arquivos/'.DS
        );
        
     $this->set($params);
    }

public function add($id = null) {
		
		if ($this->request->is('post')) {
						$this->Report->create();
						if(empty($this->data['Report']['report']['name'])){
						unset($this->request->data['Report']['report']);
						}
						if(!empty($this->data['Report']['report']['name'])){
						$file=$this->data['Report']['report'];
						$file['name']=$this->sanitize($file['name']);
						$this->request->data['Report']['report'] = time().$file['name'];

						if($this->Report->save($this->request->data)) {
						/////	
						$report['subject_id']=$id;
						$this->Report->saveField('subject_id', $id);	
						/////	
						move_uploaded_file($file['tmp_name'], WWW_ROOT . '/files/arquivos/'.DS. time().$file['name']); 

						$this->Session->setFlash(__('Arquivo salvo.'));
						return $this->redirect(array('controller'=>'subjects','action' => 'view',$id));
						}
						}
						$this->Session->setFlash(__('Unable to add your Report.'));
		}
		$subjects = $this->Report->Subject->find('list');
		$this->set(compact('subjects'));
}
	
	
function sanitize($string, $force_lowercase = true, $anal = false) {
    $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]","}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;","â€”", "â€“", ",", "<",">", "/", "?");
    $clean = trim(str_replace($strip, "", strip_tags($string)));
    $clean = preg_replace('/\s+/', "-", $clean);
    $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;
    return ($force_lowercase) ?
        (function_exists('mb_strtolower')) ?
            mb_strtolower($clean, 'UTF-8') :
            strtolower($clean) :
        $clean;
}




	public function edit($id = null) {
		if (!$this->Report->exists($id)) {
			throw new NotFoundException(__('Invalid report'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Report->save($this->request->data)) {
				$this->Flash->success(__('Arquivo salvo.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The report could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Report.' . $this->Report->primaryKey => $id));
			$this->request->data = $this->Report->find('first', $options);
		}
		$subjects = $this->Report->Subject->find('list');
		$this->set(compact('subjects'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Report->id = $id;
		if (!$this->Report->exists()) {
			throw new NotFoundException(__('Invalid report'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Report->delete()) {
			$this->Flash->success(__('The report has been deleted.'));
		} else {
			$this->Flash->error(__('The report could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
