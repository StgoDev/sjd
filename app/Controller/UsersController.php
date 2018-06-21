<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {
public function beforeFilter() {
    parent::beforeFilter();
    //For CakePHP 2.1 and up
   $this->Auth->allow('cadastrar','login','logout');
}
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
	public function index() {
		$this->Paginator->settings = array(
        'order' => array('User.name' => 'asc'),
        'limit' => 30
    );
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}
	public function search() {
  if ($this->request->is('put') || $this->request->is('post')) {
    // poor man's Post Redirect Get behavior
    return $this->redirect(array(
      '?' => array(
        'q' => $this->request->data('User.searchQuery')
      )
    ));
  }
  $this->User->recursive = 0;
  $searchQuery = $this->request->query('q');
  $this->Paginator->settings = array(
    'User' => array(
			'order' => array('User.name' => 'asc'),
      'limit' => 30,
      'findType' => 'search',
      'searchQuery' => $searchQuery
    )
  );
  $this->set('users', $this->Paginator->paginate());
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
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('Usuário cadastrado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		}
		$students = $this->User->Student->find('list');
		$groups = $this->User->Group->find('list');
		$this->set(compact('students','groups'));
	}

	public function cadastrar() {
		$this->layout = 'login';	
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('Usuário cadastrado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		}
		$students = $this->User->Student->find('list');
		$groups = $this->User->Group->find('list');
		$this->set(compact('students','groups'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('Usuário editado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$students = $this->User->Student->find('list',array('fields'=>array('Student.id','Student.nome'),'order'=>array('Student.nome'=>'asc')));
		$groups = $this->User->Group->find('list');
		$this->set(compact('students','groups'));
	}

	public function editar($id = null) {
		$id = $this->Auth->user('id');
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			// IMPORTANT >>>>>>>>>>>
      // if we have a new password, create key `password` in data
    if(!empty($new_password = $this->request->data['User']['new_password'])){
      $this->request->data['User']['password'] = $new_password;
		}else{ // else, we remove the rules on password
      $this->User->validator()->remove('password');}
      // <<<<<<<<<<<<<<<<<<<<<
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		} else {
		$this->request->data = $this->User->read(null, $id);
    unset($this->request->data['User']['password']);
		}
		$students = $this->User->Student->find('list');
		$groups = $this->User->Group->find('list');
		$this->set(compact('students','groups'));
	}
/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Flash->success(__('The user has been deleted.'));
		} else {
			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function login() {
	$this->layout = 'login';	
    if ($this->request->is('post')) {
        if ($this->Auth->login()) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        $this->Session->setFlash(__('Seu nome de usuário ou senha está incorreto.'));
    }
}

public function logout() {
    $this->Session->setFlash('Good-Bye');
$this->redirect($this->Auth->logout());
}
}
