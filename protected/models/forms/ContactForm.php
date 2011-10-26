<?php

class ContactForm extends CFormModel
{
	public $fromName;
	public $fromEmail;
	public $message;
	
	public function rules()
	{
		return array(
			array('fromName, fromEmail, message', 'required'),
			array('fromEmail', 'email'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'fromName'  => 'Seu nome',
			'fromEmail' => 'Seu email',
			'message'   => 'Mensagem',
		);
	}
}
