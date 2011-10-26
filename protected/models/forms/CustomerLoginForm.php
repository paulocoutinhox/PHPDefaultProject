<?php

class CustomerLoginForm extends CFormModel
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
			$identity = new CustomerIdentity($this->username, $this->password);
			$identity->authenticate();
			
			switch($identity->errorCode)
			{
				case CustomerIdentity::ERROR_NONE:
					$duration = $this->rememberMe ? 3600*24*30 : 0; // 30 days
					UserUtil::getDefaultWebUser()->login($identity, $duration);
					break;
				case CustomerIdentity::ERROR_USERNAME_INVALID:
					$this->addError('username', null);
					$this->addError('password', 'Usuário ou senha incorreto.');
					break;
				case CustomerIdentity::ERROR_INACTIVE:
					$this->addError('username', 'Seu usuário está inativo no sistema.');
					$this->addError('password', null);
					break;
				case CustomerIdentity::ERROR_NOT_VERIFIED:
					$this->addError('username', 'Sua conta ainda não foi ativada.');
					$this->addError('password', null);
					break;
				default:
					$this->addError('username', null);
					$this->addError('password', 'Usuário ou senha incorreto.');
					break;
			}
		}
	}
}
