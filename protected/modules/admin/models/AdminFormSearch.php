<?php

class AdminFormSearch extends CFormModel
{
	public $orderField;
    public $orderDirection;
    public $rowCount;
    public $page;
    
    
    public function init()
    {
		$this->restoreAttributes();

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
			'orderField'     => 'Ordernar por',
            'orderDirection' => 'Ordem',
            'rowCount'       => 'Quantidade de registros por página',
		);
	}

	public function storeAttributes()
	{
		$data = array();
		$this->cleanSearchData();

		foreach($this->getAttributes() as $key => $value)
		{
			$data[$key] = $value;
		}

		$searchData = UserUtil::getAdminWebUser()->getState('searchData');

		if (!is_array($searchData))
		{
			$searchData = array();
		}

		$searchData[get_class($this)] = $data;

		UserUtil::getAdminWebUser()->setState('searchData', $searchData);
	}

	protected function restoreAttributes($clean = true)
	{
		if (isset($_GET['restore']) && $_GET['restore'] == 1)
		{
			$searchData = UserUtil::getAdminWebUser()->getState('searchData');

			if (is_array($searchData) && isset($searchData[get_class($this)]))
			{
				$data = $searchData[get_class($this)];

				foreach($data as $key => $value)
				{
					$this->$key = $value;
				}

				if ($clean == true)
				{
					$this->cleanSearchData();
				}

			}
		}
	}

	protected function cleanSearchData()
	{
		$searchData = UserUtil::getAdminWebUser()->getState('searchData');

		if (is_array($searchData) && isset($searchData[get_class($this)]))
		{
			unset($searchData[get_class($this)]);
		}

		UserUtil::getAdminWebUser()->setState('searchData', $searchData);
	}
}
