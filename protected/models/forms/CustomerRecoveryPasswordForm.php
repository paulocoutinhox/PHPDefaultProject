<?php

class CustomerRecoveryPasswordForm extends CFormModel
{
	public $token;
	public $password;
	public $repeatPassword;
	
	public function rules()
	{
		return array(
			array('token, password, repeatPassword', 'required'),
			array('password', 'compare', 'compareAttribute' => 'repeatPassword'), 
			array('password, token', 'length', 'max' => 255),
			array('password','length','max' => 64, 'min' => 6),
			array('repeatPassword','length','max' => 64, 'min' => 6),			
			array('token', 'verifyIfExists'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'token' => 'Token',
			'password' => 'Senha',
			'repeatPassword' => 'Repetir senha',			
		);
	}

	public function verifyIfExists($attribute, $params)
	{
		if(!$this->hasErrors())
		{
			$count = Customer::model()->countByAttributes(array('recovery_password_token' => trim($this->token)));
			
			if ($count == 0)
			{
				$this->addError('token', 'Token inválido.');
			}
		}
	}
}
