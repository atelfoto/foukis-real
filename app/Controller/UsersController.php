<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');
/**
* login
**/
public function login() {
	$this->layout="home";
    if ($this->request->is('post')) {
        if ($this->Auth->login()) {
            return $this->redirect($this->Auth->redirectUrl());
        } else {
            $this->Session->setFlash(__('Votre nom d\'user ou mot de passe sont incorrects.'));
        }
    }
}

public function logout() {
    //Laissez vide pour le moment.
}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
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
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->layout="admin";
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->layout="admin";
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */

	public function admin_addold() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'),array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'),array('class' => 'alert alert-danger'));
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * [admin_signup description]
 * @return [type] [description]
 */
	public function admin_add(){
			if (!empty($this->request->data)) {
				$this->User->create($this->request->data);
				if($this->User->validates()){
					$token = md5(time(). ' - ' . uniqid());
					$this->User->create(array(
						'username'=> $this->request->data['User']['username'],
						'password'=> $this->Auth->password($this->request->data['User']['password']),
						'mail'   => $this->request->data['User']['mail'],
						'lastlogin'=> $this->request->data ['User']['lastlogin'] = '2010-01-01 12:00:00',
						'token'  => $token
						));
					$this->User->save();
					App::uses('CakeEmail','Network/Email');
					$CakeEmail = new CakeEmail('smtp'); // à changer par Default sur le site en ligne sinon smtp en local
					$CakeEmail->to($this->request->data['User']["mail"]);
					$CakeEmail->subject(__(' your registration to our site'));
					$CakeEmail->viewVars(
						$this->request->data['User']+
						array(
							'token'=>$token,
							'id'=>$this->User->id
							)
						);
					$CakeEmail->emailFormat('html');
					$CakeEmail->template('admin_signup');
					$CakeEmail->send();
					$this->Flash->success(
						__("Thank you you are registered mail sent to you to confirm your compte.Please check your spam in case."),
						array('class'=>'success','type'=>'ok-sign'));
					return $this->redirect(array('action'=>'index'));
				}else{
					$this->Flash->error(__("Thank you to correct your mistakes"),array('class'=>'danger','type'=>'info'));
				}
			}
		}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->layout="admin";
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'), array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'), array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * [admin_enable description]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
public function admin_enable($id=null) {
	$user = $this->User->read(null,$id);
	if (!$id && empty($user)) {
		$this->Flash->error(__('You must provide a valid ID number to enable a user.',true),array('class'=>'danger','type'=>'sign'));
		$this->redirect(array('action'=>'index'));
	}
	if (!empty($user)) {
		$user['User']['active'] = 1;
		if ($this->User->save($user)) {
			$this->Flash->success(__('User ID %s has been published.',h($id)));
		} else {
			$this->Flash->error(__('User ID %s was not saved.',h($id)),array('class'=>'danger','type'=>'sign'));
		}
		$this->redirect(array('action'=>'index'));
	} else {
		$this->Flash->error(__('No user by that ID was found.',true),array('class'=>'danger','type'=>'sign'));
		$this->redirect(array('action'=>'index'));
	}
}
/**
 * [admin_disable description]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
public function admin_disable($id=null) {
	$user = $this->User->read(null,$id);
	if (!$id && empty($user)) {
		$this->Flash->error(__('You must provide a valid ID number to disable a user.',true),array('class'=>'danger','type'=>'sign'));
		$this->redirect(array('action'=>'index'));
	}
	if (!empty($user)) {
		$user['User']['active'] = 0;
		if ($this->User->save($user)) {
			$this->Flash->success(__('User ID %s has been disabled.', h($id)));
		} else {
			$this->Flash->error(__('User ID %s was not saved.',h($id)),array('class'=>'danger','type'=>'sign'));
		}
		$this->redirect(array('action'=>'index'));
	} else {
		$this->Flash->error(__('No User by that ID was found.',true),array('class'=>'danger','type'=>'sign'));
		$this->redirect(array('action'=>'index'));
	}
}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->layout="admin";
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Flash->success(__('The user has been deleted.'), array('class' => 'alert alert-success'));
		} else {
			$this->Flash->error(__('The user could not be deleted. Please, try again.'), array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
