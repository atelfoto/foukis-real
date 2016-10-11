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
	public $displayField = array('username');
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session',"Qimage");
/**
* login
**/
	public function login() {
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	        	$this->request->prefix;
	            $this->User->id =  $this->Auth->user("id");
					$this->User->saveField('lastlogin',date('Y-m-d H:i:s'));
					$this->Flash->success( __("Bonjour  %s Vous êtes maintenants connecté",  $this->Auth->user("username") ),array('class'=>'success' ,'type'=>'ok'));
					if ($this->Session->read('Auth.User.role')== "admin") {
						return $this->redirect($this->Auth->redirect(array('controller' => 'menus', 'action' => 'dashboard','admin'=>true)));
					}
					if ($this->Session->read('Auth.User.role')== "member") {
						return $this->redirect($this->Auth->redirect(array('controller' => 'menus', 'action' => 'dashboard','member'=>true)));
					}
	        } else {
	            $this->Flash->error(__('Votre nom d\'user ou mot de passe sont incorrects.'));
	        }
	    }
	}
/**
 * [admin_logout description]
 * @return [type] [description]
 */
	public function admin_logout(){
		$this->Auth->logout();
		$this->Flash->success(__("Vous êtes maintenants Déconnecté"),array('class'=>'success','type'=>'ok'));
		$this->redirect('/');
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

// /**
//  * view method
//  *
//  * @throws NotFoundException
//  * @param string $id
//  * @return void
//  */
// 	public function view($id = null) {
// 		if (!$this->User->exists($id)) {
// 			throw new NotFoundException(__('Invalid user'));
// 		}
// 		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
// 		$this->set('user', $this->User->find('first', $options));
// 	}

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
 * [admin_signup description]
 * @return [type] [description]
 */
	public function signup(){
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
					return $this->redirect(array("controller"=>"menus",'action'=>'dashboard',"admin"=>true));
				}else{
					$this->Flash->error(__("Thank you to correct your mistakes"),array('class'=>'danger','type'=>'info'));
				}
			}
		// $groups = $this->User->Group->find('list');
		// $this->set(compact('groups'));
		}

/**
 * [activate description]
 * @param  [type] $user_id [description]
 * @param  [type] $token   [description]
 * @return [type]          [description]
 */
	public function activate($user_id,$token){
		$user = $this->User->find('first',array(
			'fields'     =>array('id'),
			'conditions' => array('id'=> $user_id, 'token'=>$token)
			));
		if(empty($user)){
			$this->Flash->error(__("This change link is not good"),array('class'=>'danger', "type"=>'info'));
			return $this->redirect('/');
		}
		$this->Flash->success(__("Your account has been validated"),array('class'=>'success', "type"=>'ok'));
		$this->User->save(array(
			'id'     => $user['User']['id'],
			'active' => 1,
			'token'  => ''
			));
		return $this->redirect(array('action'=>'login'));
	}
/**
 * [forgot description]
 * @return [type] [description]
 */
	public function forgot (){
		if(!empty($this->request->data)){
			$user = $this->User->findByMail($this->request->data['User']['mail'],array('id'));
			if(empty($user)){
				$this->Session->Flash->error(__("This email address is not associated with any account"),array('class'=>"danger",'type'=>'info'));
			}else{
				$token = md5(uniqid().time());
				$this->User->id = $user['User']['id'];
				$this->User->saveField('token', $token);
				App::uses('CakeEmail', 'Network/Email');
				$cakeMail = new CakeEmail('smtp');// à changer par default sur le site en ligne ou smtp en local
				$cakeMail->to($this->request->data['User']['mail']);
				$cakeMail->from(array('atelfoto@msn.com'=>"foukis realestate"));
				$cakeMail->subject(__('Password regeneration'));
				$cakeMail->template('forgot');
				$cakeMail->viewVars(array('token' =>$token,'id'=>$user['User']['id']));
				$cakeMail->emailFormat('text');
				$cakeMail->send();
				$this->Flash->success(__("An email was sent to you with instructions to regenerate your password! Please check your span !!"),  array(
					'class'=>'info','type'=>'info'));
			}
		}
	}
/**
 * [password description]
 * @param  [type] $user_id [description]
 * @param  [type] $token   [description]
 * @return [type]          [description]
 */
	public function password($user_id,$token){
		$user = $this->User->find('first',array(
			'fields'     =>array('id'),
			'conditions' => array('id'=> $user_id, 'token'=>$token)
			));
		if(empty($user)){
			$this->Flash->error(__("This link does not look good"),array('class'=>'danger','type'=>'info'));
			return $this->redirect(array('action'=>'forgot'));
		}
		if(!empty($this->request->data)){
			$this->User->create($this->request->data);
			if ($this->User->validates()){
				$this->User->create();
				$this->User->save(array(
					'id'=>$user['User']['id'],
					'token'=>'',
					'active'=> 1,
					'password'=> $this->Auth->password($this->request->data['User']['password'])
					));
				$this->Flash->success(__("your password has been changed"),  array('class'=>'success',"type"=>"ok"));
				return $this->redirect(array('action'=>'login'));
			}
		}
	}
/**
 * [admin_account description]
 * @return [type] [description]
 */
	public function admin_account(){
		if (!empty($this->request->data)) {
			$this->request->data['User']['id'] = $this->Auth->user('id');
			$this->User->create($this->request->data);
			if($this->User->validates('isJpg')){
				$this->User->create();
				$this->User->save($this->request->data, true, array('firstname','lastname','name','mail'));
				if(!empty($this->request->data['User']['avatarf']['tmp_name'])) {
					$directory = IMAGES. 'avatars' . DS . ceil($this->User->id/1000);
					if(!file_exists($directory))
						mkdir($directory, 0777);
					move_uploaded_file($this->request->data['User']['avatarf']['tmp_name'], $directory . DS . $this->User->id . '.jpg');
					$this->User->saveField('avatar', 1);
				}
				$user = $this->User->read();
				$this->Auth->login($user['User']);
				$this->Flash->success(__("Your information has been changed"),  array('class'=>"success", "type"=>'ok'));
			}else{
				$errors = $this->User->invalidFields();
				$this->Flash->error(__("Your information could not be validated"),  array('class'=>"danger", "type"=>'info'));
			}
		}else{
			$this->User->id= $this->Auth->user('id');
			$this->request->data = $this->User->read();
		}
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
		// $groups = $this->User->Group->find('list');
		// $this->set(compact('groups'));
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
		// $groups = $this->User->Group->find('list');
		// $this->set(compact('groups'));
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
