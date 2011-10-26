<?php

class AdminWebUser extends CWebUser
{
	
	private $model;
	
	public function getModel()
	{
		if ($this->model == null)
		{
			$this->model = User::model()->findByPk($this->getId());
		}
		
		return $this->model;
	}
	
}