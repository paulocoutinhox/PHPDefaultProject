<?php

class AdminForm extends CFormModel
{
	public $id;
    public $criado_em;
    public $alterado_em;
	    
    public function init()
    {
        $this->setAttributes($_POST);                
        $this->setAttributes($_GET);
        
        if (isset($_POST[get_class($this)]))
        {
            $this->setAttributes($_POST[get_class($this)]);            
        }
        
        if (isset($_GET[get_class($this)]))
        {
            $this->setAttributes($_GET[get_class($this)]);
        }
        
        $this->validate();
    }
    
    public function rules()
	{
		return array(
			array('id', 'safe'),
            array('id', 'numerical', 'integerOnly'=>true),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id'=>'Código',
            'criado_em'=>'Criado em',
            'alterado_em'=>'Alterado em',
		);
	}
}
