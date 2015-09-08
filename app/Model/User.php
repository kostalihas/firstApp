<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * User Model
 *
 * @property Group $Group
 * @property Post $Post
 */
class User extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */

var $name = 'User';

public $displayField='username';

	public $validate = array(
		'username' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array( 
			'min' => array( 
				'rule' => array('minLength', 6),
				 'message' => 'Usernames must be at least 6 characters.' ),
		 'required' => array( 
		 	'rule' => 'notEmpty', 
		 	'message'=>'Please enter a password.' 
		 	),
		 	 ),

        	'confirm_passwd' => array( 
        		'required'=>'notEmpty', 
        		'match'=>array(
        		 'rule' => 'validatePasswdConfirm',
        		  'message' => 'Passwords do not match' ) ),

		
			
		'email' => array(
			'email' => array(
				'rule' => 'email',
				'message' => 'Please provide a valid email address.',
				'last' => true,
			),
			'isUnique' => array(
				'rule' => 'isUnique',
				'message' => 'Email address already in use.',
				'last' => true,
			),
			),
			
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
function validatePasswdConfirm($data) { 
	if ($this->data['User']['password'] !== $data['confirm_passwd']) {
	 return false;
	  }
	   return true; 
}


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	 //public $actsAs = array('Acl' => array('type' => 'requester'));
	 
	 //modifiez le actsAs pour le model User et désactivez la directive requester:
	   public $actsAs = array(
	   	'Acl' => array('type' => 'requester', 'enabled' => false),
	   	'Search.Searchable',
	   	);


public $filterArgs = array(
		'username' => array('type' => 'like', 'field' => array('User.username')),
		'group_id' => array('type' => 'value'),
	);
    public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['group_id'])) {
            $groupId = $this->data['User']['group_id'];
        } else {
            $groupId = $this->field('group_id');
        }
        if (!$groupId) {
            return null;
        }
        return array('Group' => array('id' => $groupId));
    }

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Notification'
	);
	
	 public function beforeSave($options = array()) {
        $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        return true;
        $this->data['User']['resetkey'] = Security::hash(mt_rand(),'md5',true);
            return true;
    }
	
	public function bindNode($user) {
    return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
}

	

}
