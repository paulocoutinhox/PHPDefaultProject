<?php

class WebUser extends CWebUser
{
	
	private $model;
	
	public function getModel()
	{
		if ($this->model == null)
		{
			$this->model = Customer::model()->findByPk($this->getState('id'));
		}
		
		return $this->model;
	}
	
}