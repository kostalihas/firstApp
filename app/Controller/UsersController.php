<?php
App::uses('AppController', 'Controller');
App::uses('CakePdf','CakePdf.Pdf');
App::uses('CakeEmail', 'Network/Email');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array(
		'Paginator',
        'Cookie',
		'Search.Prg' => array(
			'presetForm' => array(
				'paramType' => 'querystring',
			),
			'commonProcess' => array(
				'paramType' => 'querystring',
				'filterEmpty' => true,
			),
		),
		);

	var $helpers = array('Html', 'Form', 'Time');

/**
 * index method
 *
 * @return void
 */

public function getNotif(){
	if($this->Auth->User('id')){

	$messages=$this->User->Notification->find('all',array(
		'fields'=>array(
			'message','title'),
			'conditions'=>array('lu'=>false))
	);

	$nbr=$this->User->Notification->find('count',array(
		'fields'=>array(
			'message','title'),
			'conditions'=>array('lu'=>false))
	);

	$this->Session->write('notif.messages',$messages);
	$this->Session->write('notif.nbr',$nbr);
}

}
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
		   $this->User->id = $id;
            if (!$this->User->exists()) {
                throw new NotFoundException(__('Invalid User'));
            }
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->pdfConfig = array(
			    
                'orientation' => 'landscape',
                'filename' => 'user_' . $id .'.pdf'
            );
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
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
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
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
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
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	/**
	*login method
	*
	*/
	
	public function login() {
	if ($this->Session->read('Auth.User')) {
        $this->Session->setFlash('Vous êtes connecté!');
        return $this->redirect('/');
    }
    if ($this->request->is('post')) {
        if ($this->Auth->login()) {

            if ($this->request->data['User']['remember'] == 1) {
        // After what time frame should the cookie expire
        $cookieTime = "12 months"; // You can do e.g: 1 week, 17 weeks, 14 days
 
    // remove "remember me checkbox"
    unset($this->request->data['User']['remember']);
                 
    // hash the user's password
    $this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['password']);
                 
    // write the cookie
    $this->Cookie->write('remember', $this->request->data['User'], true, $cookieTime);
}

            return $this->redirect(array('controller' => 'posts', 'action' => 'add'));
        } else {
            $this->Session->setFlash(__('Votre nom d\'user ou mot de passe sont incorrects.'));
        }
    }
    
    }


    public function logout() {
	$this->Session->setFlash('Au-revoir');
	$this->Session->delete('notif');
    $this->Cookie->delete('remember');
return $this->redirect($this->Auth->logout());

    
}


    public function beforeFilter() {
    parent::beforeFilter();
    $this->Cookie->httpOnly = true;
    $this->Cookie->type('rijndael');
    	$this->getNotif();
    
    //$this->Auth->allow('initDB'); // Nous pouvons supprimer cette ligne après avoir fini
	$this->Auth->allow('forgot_password','reset_password_token');
}

public function initDB() {
    $group = $this->User->Group;
    // Autorise l'accès à tout pour les admins
    $group->id = 1;
    $this->Acl->allow($group, 'controllers');

    // Autorise l'accès aux posts et widgets pour les managers
    $group->id = 2;
    $this->Acl->deny($group, 'controllers');
	$this->Acl->allow($group, 'controllers/Users/logout');
    $this->Acl->allow($group, 'controllers/Posts');
    $this->Acl->allow($group, 'controllers/Widgets');
    $this->Acl->allow($group, 'controllers/Notifications/index');

    // Autorise l'accès aux actions add et edit des posts widgets pour les utilisateurs de ce groupe
    $group->id = 3;
    $this->Acl->deny($group, 'controllers');
    $this->Acl->allow($group, 'controllers/Posts/add');
    $this->Acl->allow($group, 'controllers/Posts/edit');
    $this->Acl->allow($group, 'controllers/Widgets/add');
    $this->Acl->allow($group, 'controllers/Notifications/index');

    // Permet aux utilisateurs classiques de se déconnecter
    $this->Acl->allow($group, 'controllers/users/logout');

    // Nous ajoutons un exit pour éviter d'avoir un message d'erreur affreux "missing views" (manque une vue)
    echo "tout est ok";
    exit;
}
 /**
     * Allow a user to request a password reset.
     * @return
     */

function forgot_password() {
        if (!empty($this->data)) {
            $user = $this->User->findByUsername($this->data['User']['username']);
            if (empty($user)) {
                $this->Session->setflash('Sorry, the username entered was not found.');
                $this->redirect('/users/forgot_password');
            } else {
                $user = $this->__generatePasswordToken($user);
                if ($this->User->save($user) && $this->__sendForgotPasswordEmail($user['User']['id'])) {
                    $this->Session->setflash('Password reset instructions have been sent to your email address.
						You have 24 hours to complete the request.');
                    $this->redirect('/users/login');
                }
            }
        }
    }

     /**
     * Allow user to reset password if $token is valid.
     * @return
     */
    function reset_password_token($reset_password_token = null) {
        if (empty($this->data)) {
            $this->data = $this->User->findByResetPasswordToken($reset_password_token);
            if (!empty($this->data['User']['reset_password_token']) && !empty($this->data['User']['token_created_at']) &&
            $this->__validToken($this->data['User']['token_created_at'])) {
                //$this->data['User']['id'] = null;
                $_SESSION['token'] = $reset_password_token;
            } else {
                $this->Session->setflash('The password reset request has either expired or is invalid.');
                $this->redirect('/users/login');
            }
        } else {
            if ($this->data['User']['reset_password_token'] != $_SESSION['token']) {
                $this->Session->setflash('The password reset request has either expired or is invalid.');
                $this->redirect('/users/login');
            }
            $user = $this->User->findByResetPasswordToken($this->data['User']['reset_password_token']);
            $this->User->id = $user['User']['id'];
            if ($this->User->save($this->data, array('validate' => 'only'))) {
                $this->data['User']['reset_password_token'] = $this->data['User']['token_created_at'] = null;
                if ($this->User->save($this->data) && $this->__sendPasswordChangedEmail($user['User']['id'])) {
                    unset($_SESSION['token']);
                    $this->Session->setflash('Your password was changed successfully. Please login to continue.');
                    $this->redirect('/users/login');
                }
            }
        }

    }
        /**
     * Generate a unique hash / token.
     * @param Object User
     * @return Object User
     */
    function __generatePasswordToken($user) {
        if (empty($user)) {
            return null;
        }
        // Generate a random string 100 chars in length.
        $token = "";
        for ($i = 0; $i < 100; $i++) {
            $d = rand(1, 100000) % 2;
            $d ? $token .= chr(rand(33,79)) : $token .= chr(rand(80,126));
        }
        (rand(1, 100000) % 2) ? $token = strrev($token) : $token = $token;
        // Generate hash of random string
        $hash = Security::hash($token, 'sha256', true);;
        for ($i = 0; $i < 20; $i++) {
            $hash = Security::hash($hash, 'sha256', true);
        }
        $user['User']['reset_password_token'] = $hash;
        $user['User']['token_created_at']     = date('Y-m-d H:i:s');
        return $user;
    }
 /**
     * Validate token created at time.
     * @param String $token_created_at
     * @return Boolean
     */
    function __validToken($token_created_at) {
        $expired = strtotime($token_created_at) + 86400;
        $time = strtotime("now");
        if ($time < $expired) {
            return true;
        }
        return false;
    }


    /**
     * Sends password reset email to user's email address.
     * @param $id
     * @return
     */
    function __sendForgotPasswordEmail($id = null) {
        if (!empty($id)) {
            $email= new CakeEmail('gmail');
            $this->User->id = $id;
            $User = $this->User->read();
            $email->to ($User['User']['email']);
            $email->subject('Forgot Password - DO NOT REPLY');
            $email->from (array('med.has.kostali@gmail.com' =>'Tesla Team'));
            $email->emailFormat('html');
            $email->viewVars(array('username' => $User['User']['username'] , 'reset_password_token'=>$User['User']['reset_password_token'] ));
            $email->template('reset_password_request');
            
            $this->set('User', $User);
            $email->send();
            return true;
        }
        return false;
    }


    /**
     * Notifies user their password has changed.
     * @param $id
     * @return
     */
    function __sendPasswordChangedEmail($id = null) {
        if (!empty($id)) {
        	$email= new CakeEmail('gmail');
            $this->User->id = $id;
            $User = $this->User->read();
            $email->to($User['User']['email']);
            $email->subject('Password Changed - DO NOT REPLY');
            $email->emailFormat('html');
            $email->viewVars(array('username' => $User['User']['username']));
            $email->from(array('med.has.kostali@gmail.com' =>'Tesla Team'));
            $email->template('password_reset_success');
            
            $this->set('User', $User);
            $email->send();
            return true;
        }
        return false;
    }

}

