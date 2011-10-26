<?php

class AdminFormSearchContent extends AdminFormSearch
{
	public $id;
	public $title;
    	
    public function init()
    {
        parent::init();    
    }
    
	public function rules()
	{
		return array_merge(
        array(
			array('id, title', 'safe'),
		), parent::rules());
	}

	public function attributeLabels()
	{
		return array_merge(
        array(
			'id'    => 'Código',
            'title' => 'Título',
		), parent::attributeLabels());
	}
}
