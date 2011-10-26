<?php

class AdminFormSearchPermission extends AdminFormSearch
{
	public $id;
	public $module;
	public $action;
    	
    public function init()
    {
        parent::init();    
    }
    
	public function rules()
	{
		return array_merge(
        array(
			array('id, module, action', 'safe'),
		), parent::rules());
	}

	public function attributeLabels()
	{
		return array_merge(
        array(
			'id'=>'Código',
            'module'=>'Módulo',
            'action'=>'Ação',
		), parent::attributeLabels());
	}
}
