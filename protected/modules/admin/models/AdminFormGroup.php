<?php

class AdminFormGroup extends AdminForm
{
	public $id;
	public $description;
	public $active;
	    	
    public function init()
    {
        parent::init();    
    }
    
	public function rules()
	{
		return array_merge(
        array(
			array('active', 'numerical', 'integerOnly'=>true),
			array('description', 'length', 'max'=>255),
			array('description, active', 'required'),
		),
		parent::rules());
	}

	public function attributeLabels()
	{
		return array_merge(
        array(
			'id' => 'Código',
			'description' => 'Descrição',
			'active' => 'Ativo',
		),
		parent::attributeLabels());
	}

}
