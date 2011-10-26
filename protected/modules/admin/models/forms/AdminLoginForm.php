<?php

class AdminLoginForm extends CFormModel
{
	public $username;
	public $password;
	public $rememberMe;

	public function rules()
	{
		return array(
			array('username, password', 'required'),
			array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u', 'message' => 'Usuário somente pode conter letras e números.'),
			array('rememberMe', 'boolean'),
			array('password', 'authenticate'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'rememberMe'=>'Lembrar de mim',
            'username'=>'Usuário',
            'password'=>'Senha',
		);
	}

	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$identity = new AdminIdentity($this->username, $this->password);
			$identity->authenticate();
			
			switch($identity->errorCode)
			{
				case AdminIdentity::ERROR_NONE:
					$duration = $this->rememberMe ? 3600*24*30 : 0; // 30 days
					UserUtil::getAdminWebUser()->login($identity, $duration);
					break;
				case AdminIdentity::ERROR_USERNAME_INVALID:
					$this->addError('username','Usuário incorreto.');
					break;
				case AdminIdentity::ERROR_INACTIVE:
					$this->addError('username','Seu usuário está inativo no sistema.');
					break;
				default:
					$this->addError('password','Usuário ou senha incorreto.');
					break;
			}
		}
	}
}
