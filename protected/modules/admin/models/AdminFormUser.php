<?php

class AdminFormUser extends AdminForm
{
	public $id;
	public $name;
	public $username;
    public $email;
    public $password;
    public $repeat_password;
    public $root;
    public $active;
	    	
    public function init()
    {
        parent::init();    
    }
    
	public function rules()
	{
		return array_merge(
        array(
			array('active, root', 'numerical', 'integerOnly'=>true),
			array('name, username, email, password, repeat_password', 'length', 'max'=>255),
            array('name, active, root, email', 'required'),
            array('email', 'email'),
            array('password', 'compare', 'compareAttribute'=>'repeat_password'),
			array('username', 'uniqueUsername'),
		),
		parent::rules());
	}

	public function attributeLabels()
	{
		return array_merge(
        array(
			'id' => 'Código',
			'name' => 'Nome',
			'email' => 'Email',
			'active' => 'Ativo',
			'username' => 'Usuário',
			'password' => 'Senha',
			'repeat_password' => 'Repetir senha',
			'root' => 'Super usuário',
		),
		parent::attributeLabels());
	}

	public function uniqueUsername($attribute, $params)
	{
		if (empty($this->username) == false)
		{
			if ($this->id > 0)
			{
				$user = User::model()->findByAttributes( array('username' => trim($this->username)));
				
				if ($user != null && $user->id != $this->id)
				{
					$this->addError('username', 'Este nome de usuário já está sendo usado');
				}
			}
			else
			{
				$user = User::model()->findByAttributes( array('username' => trim($this->username)));

				if ($user != null)
				{
					$this->addError('username', 'Este nome de usuário já está sendo usado');
				}
			}
		}
	}

}
