<?php

class CustomerForgotPasswordForm extends CFormModel
{
	public $email;
	
	public function rules()
	{
		return array(
			array('email', 'required'),
			array('email', 'email'),
			array('email', 'verifyIfExists'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'email' => 'Email',
		);
	}

	public function verifyIfExists($attribute, $params)
	{
		if(!$this->hasErrors())
		{
			$count = Customer::model()->countByAttributes(array('email' => trim($this->email)));
			
			if ($count == 0)
			{
				$this->addError('email', 'Este e-mail não existe.');
			}
		}
	}
}
