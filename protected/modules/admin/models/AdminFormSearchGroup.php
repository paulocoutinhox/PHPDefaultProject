<?php

class AdminFormSearchGroup extends AdminFormSearch
{
	public $id;
	public $description;
    	
    public function init()
    {
        parent::init();    
    }
    
	public function rules()
	{
		return array_merge(
        array(
			array('id, description', 'safe'),
		), parent::rules());
	}

	public function attributeLabels()
	{
		return array_merge(
        array(
			'id'=>'Código',
            'description'=>'Descrição'
		), parent::attributeLabels());
	}
}
