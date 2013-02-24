<?php

class Customer extends Table
{

	protected $dateFields = array('birth_date');

	const STATUS_ACTIVE       = 1;
	const STATUS_INACTIVE     = 2;
	const STATUS_SUSPENDED    = 3;
	const STATUS_NOT_VERIFIED = 4;

	protected $salt = '';
	public $repeat_password;
	public $verify_code;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'customer';
	}

	public function rules()
	{
		return array(
			array('username, password, name, email, status, birth_date, gender', 'required'),
			array('status, gender', 'numerical', 'integerOnly' => true),
			array('name', 'length', 'max' => 50),
			array('username, password, email, recovery_password_token, activation_token', 'length', 'max' => 255),
			array('created_at, status', 'unsafe'),

			// convert username to lower case
			array('username', 'filter', 'filter'=>'strtolower'),

			// check username characters
			array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u', 'message' => 'Usuário somente pode conter letras e números.'),

			// check password
			array('password','length','max' => 64, 'min' => 6),
			array('repeat_password','length','max' => 64, 'min' => 6),

			// compare password to repeated password
			array('password', 'compare', 'compareAttribute'=>'repeat_password'),

			// compare email to repeated email
			//array('email', 'compare', 'compareAttribute'=>'repeatEmail'), 

			// make sure email is a valid email
			array('email','email'),

			// make sure username and email are unique
			array('username, email', 'unique'),

			// verify_code needs to be entered correctly
			//array('verify_code', 'captcha', 'allowEmpty' => !extension_loaded('gd')),
		);
	}

	public function relations()
	{
		return array(

		);
	}

	public function attributeLabels()
	{
		return array(
			'id'                      => 'Código',
			'name'                    => 'Nome completo',
			'username'                => 'Usuário',
			'password'                => 'Senha',
			'repeat_password'         => 'Repetir senha',
			'email'                   => 'Email',
			'status'                  => 'Status',
			'verify_code'             => 'Código de verificação',
			'gender'                  => 'Sexo',
			'birth_date'              => 'Nascimento',
			'created_at'              => 'Criado em',
			'recovery_password_token' => 'Token para recuperação de senha',
			'activation_token'        => 'Token para ativação',
		);
	}

	public function validatePassword($password)
	{
		return $this->hashPassword($password, $this->salt) === $this->password;
	}

	public function hashPassword($password, $salt)
	{
		return md5($salt.$password);
	}

	public function getSalt()
	{
		return $this->salt;
	}

	public function withRecoveryPasswordToken($token)
	{
		$this->getDbCriteria()->mergeWith(array(
			'condition' => 'recovery_password_token = :recovery_password_token',
			'params' => array(':recovery_password_token' => trim($token)),
		));

		return $this;
	}

	public function withActivationToken($token)
	{
		$this->getDbCriteria()->mergeWith(array(
			'condition' => 'activation_token = :activation_token',
			'params' => array(':activation_token' => trim($token)),
		));

		return $this;
	}

	public function withUsername($username)
	{
		$this->getDbCriteria()->mergeWith(array(
			'condition' => 'username = :username',
			'params' => array(':username' => trim($username)),
		));

		return $this;
	}

	protected function beforeSave()
	{
		$this->password = $this->hashPassword($this->password, $this->getSalt());
		return parent::beforeSave();
	}

	protected function beforeDelete()
	{
		return parent::beforeDelete();
	}

}