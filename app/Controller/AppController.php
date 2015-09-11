<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

App::uses('CakePdf','CakePdf.Pdf');
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    

 public $components = array(
       'RequestHandler' => array(
        'viewClassMap' => array('pdf' => 'CakePdf.Pdf')
    ),
        'Acl',
        'Auth' => array(
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            )
        ),
        'Session',
        'Cookie'
        
    );

 
   
     // The rest of AppController goes here
	
    public $helpers = array('Html', 'Form', 'Session');

    public function beforeFilter() {
        
     
     // set cookie options
    
     
    if (!$this->Auth->loggedIn() && $this->Cookie->read('remember')) {
         $cookie = $this->Cookie->read('remember');
 
            
         $user = $this->User->find('first', array(
                'conditions' => array(
                    'User.username' => $cookie['username'],
                    'User.password' => $cookie['password']
                )
         ));
     
         if ($user && !$this->Auth->login($user['User'])) {
                $this->redirect('/aclbake/users/logout'); // destroy session & cookie
         }
     }
     //Configure AuthComponent

        $this->Auth->loginAction = array(
          'controller' => 'users',
          'action' => 'login'
        );
        $this->Auth->logoutRedirect = array(
          'controller' => 'users',
          'action' => 'login'
        );
        $this->Auth->loginRedirect = array(
          'controller' => 'posts',
          'action' => 'add'
        );
		$this->Auth->allow('display');
		$this->set('logged_in', $this->Auth->loggedIn());
		$this->set('current_user',$this->Auth->user());
  
}
}
