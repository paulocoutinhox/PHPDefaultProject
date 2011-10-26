<?php

class AdminFormPermission extends AdminForm
{
	public $id;
	public $module;
	public $module_description;
	public $action;
	public $action_description;
	    	
    public function init()
    {
        parent::init();    
    }
    
	public function rules()
	{
		return array_merge(
        array(
			array('module, module_description, action, action_description', 'length', 'max'=>255),
			array('module, action', 'required'),
		),
		parent::rules());
	}

	public function attributeLabels()
	{
		return array_merge(
        array(
			'id' => 'Código',
			'module' => 'Módulo',
			'module_description' => 'Descrição',
			'action' => 'Ação',
			'action_description' => 'Descrição',
		),
		parent::attributeLabels());
	}

}
