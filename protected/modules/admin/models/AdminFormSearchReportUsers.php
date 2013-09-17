<?php

class AdminFormSearchReportUsers extends AdminFormSearch
{
	public $email;
	public $username;
	public $active;

    public function init()
    {
        parent::init();    
    }
    
	public function rules()
	{
		return array_merge(
        array(
			array('email, username, active', 'safe'),
		), parent::rules());
	}

	public function attributeLabels()
	{
		return array_merge(
        array(
			'email'    => 'E-mail',
			'username' => 'Usuário',
			'active'   => 'Ativo',
		), parent::attributeLabels());
	}
}
