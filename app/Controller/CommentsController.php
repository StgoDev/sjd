<?php
App::uses('AppController', 'Controller');
/**
 * Comentarios Controller
 *
 * @property Comentario $Comentario
 */
class CommentsController extends AppController {

        public function add() {
              if ($this->request->is('post')) {
                  $this->Comment->create();
                  $this->request->data['Comment']['user_id'] = $this->Auth->user('id');
                  if ($this->Comment->save($this->request->data)) {
                  $this->Session->setFlash(__('Comentário salvo.'));
                  $this->redirect(array('controller' => 'reports', 'action' => 'view', $this->request->data['Comment']['report_id']));
                  } else {
                  $this->Session->setFlash(__('Comentário não foi salvo. Por favor, tente novamente.'));
                  }
              }
              $reports = $this->Comment->Report->find('list');
              $users = $this->Comment->User->find('list');
              $this->set(compact('reports', 'users'));
        }

}
