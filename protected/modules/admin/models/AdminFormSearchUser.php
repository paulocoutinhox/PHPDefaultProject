<?php

class AdminFormSearchUser extends AdminFormSearch
{
	public $id;
	public $name;
	public $email;
	public $active;
    	
    public function init()
    {
        parent::init();    
    }
    
	public function rules()
	{
		return array_merge(
        array(
			array('id, name, email, active', 'safe'),
		), parent::rules());
	}

	public function attributeLabels()
	{
		return array_merge(
        array(
			'id'=>'Código',
            'name'=>'Name',
            'email'=>'Email',
            'active'=>'Ativo',
		), parent::attributeLabels());
	}
}
