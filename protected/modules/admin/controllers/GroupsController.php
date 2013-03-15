<?php

class GroupsController extends AdminFormController
{
	
	protected $moduleTitle    = 'Grupos';
	protected $formModel      = 'AdminFormGroup';
	protected $formSearchModel = 'AdminFormSearchGroup';
	protected $model          = 'Group';
	
    public function actionIndex()
	{
		$this->orderFieldsForSearch = array(
			'id'          => 'código',
			'description' => 'descrição'
		);
		
		$this->orderFieldDefaultForSearch = 'id';
		
		$this->orderDirectionDefaultForSearch = Constants::DESC_ID;
	
		parent::actionIndex();
	}
	
	protected function createParameters()
	{
		// cria parâmetros da pesquisa
        if ($this->formSearch->id && trim($this->formSearch->id) != '')
        {
            $this->arrConditions[]  = 'id = :id';
            $this->arrParameters    = array_merge($this->arrParameters, array(':id' => $this->formSearch->id));
            $this->arrParametersUrl = array_merge($this->arrParametersUrl, array('id' => $this->formSearch->id));
        }
                
        if ($this->formSearch->description && trim($this->formSearch->description) != '')
        {
            $this->arrConditions[]  = 'description LIKE :description';
            $this->arrParameters    = array_merge($this->arrParameters, array(':description' => '%' . $this->formSearch->description . '%'));
            $this->arrParametersUrl = array_merge($this->arrParametersUrl, array('description' => $this->formSearch->description));
        }
	}

	protected function afterActionView()
	{
		$this->addToRenderData('permissions', Permission::model()->orderByModule()->findAll());
		return parent::afterActionView();
	}

	protected function afterSaveModel()
	{
		Group::clearPermissions($this->modelForSave->id);
		Group::addPermissions($this->modelForSave->id, Yii::app()->request->getParam('permissions', array()));
		return parent::afterSaveModel();
	}

	protected function afterActionAdd()
	{
		$this->addToRenderData('permissions', Permission::model()->orderByModule()->findAll());
		return parent::afterActionAdd();
	}

	protected function afterUpdateModel()
	{
		Group::clearPermissions($this->modelForUpdate->id);
		Group::addPermissions($this->modelForUpdate->id, Yii::app()->request->getParam('permissions', array()));
		return parent::afterUpdateModel();
	}

	protected function afterActionUpdate()
	{
		$this->addToRenderData('permissions', Permission::model()->orderByModule()->findAll());
		return parent::afterActionUpdate();
	}

}