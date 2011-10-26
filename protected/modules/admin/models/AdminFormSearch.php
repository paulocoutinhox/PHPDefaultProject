<?php

class AdminFormSearch extends CFormModel
{
	public $orderField;
    public $orderDirection;
    public $rowCount;
    public $page;
    
    
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
        
        $this->page = ((int)$this->page <= 0 ? $this->page = 1 : (int)$this->page);
                
        $this->validate();
    }
    
    public function rules()
	{
		return array(
			array('orderField, orderDirection, rowCount, page', 'safe'),
            array('page', 'numerical', 'integerOnly'=>true),
		);
	}

	public function attributeLabels()
	{
		return array(
			'orderField'=>'Ordernar por',
            'orderDirection'=>'Ordem',
            'rowCount'=>'Quantidade de registros por página',
		);
	}
}
