<?php

class AdminFormProfile extends AdminForm
{
	public $name;
	public $email;
    public $password;
    public $repeat_password;
        	
    public function init()
    {
        parent::init();    
    }
    
	public function rules()
	{
		return array_merge(
        array(
			array('name, email, password, repeat_password', 'safe'),
            array('name, email', 'required'),
            array('password', 'compare', 'compareAttribute'=>'repeat_password'),
			array('active, admin', 'unsafe'),
		), parent::rules());
	}

	public function attributeLabels()
	{
		return array_merge(
        array(
			'name'=>'Nome',
			'email'=>'Email',
            'password'=>'Senha',
            'repeat_password'=>'Repetir senha',
		), parent::attributeLabels());
	}
}
