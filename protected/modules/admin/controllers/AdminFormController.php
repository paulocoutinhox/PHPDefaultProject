<?php

class AdminFormController extends AdminController
{
	protected $moduleTitle = 'AdminFormController';
	
	protected $formModel;
	protected $formSeachModel;
	protected $model;
	protected $form;
	protected $formSearch;
	
	protected $arrConditions;
    protected $arrParameters;
    protected $arrParametersUrl;
	protected $arrOrderField;
	protected $arrRowCount;
	protected $arrOrderDirection;
	protected $orderFieldsForSearch;
	protected $orderFieldDefaultForSearch;
	protected $orderDirectionDefaultForSearch;
	
	protected $modelForSave;
	protected $formModelForSave;
	protected $modelForUpdate;
	protected $formModelForUpdate;
    protected $modelForView;
	
	protected $renderData;

    protected $criteriaForSearch;
	
    public function actionIndex()
	{
		if ($this->beforeActionIndex() == true)
		{
			if ($this->criteriaForSearch == null)
            {
                $this->criteriaForSearch = new CDbCriteria();
            }

			$model                  = new $this->model;
			$this->formSearch       = new $this->formSeachModel;

			$this->arrConditions    = array();
			$this->arrParameters    = array();
			$this->arrParametersUrl = array();
			$this->arrOrderField    = array();

			$this->createParameters();

            $this->criteriaForSearch->condition = implode(' AND ', $this->arrConditions);
            $this->criteriaForSearch->params    = $this->arrParameters;

			// cria parâmetros de ordenação para a pesquisa
			foreach($this->orderFieldsForSearch as $key => $value)
			{
				$this->arrOrderField = array_merge($this->arrOrderField, array($key => $value));
			}

			$this->arrOrderDirection = ComponentsForSearch::listForOrder();
			$this->arrRowCount       = ComponentsForSearch::listForRowCount();

			ComponentsForSearch::paramsForSearchQuery($this->formSearch, $this->criteriaForSearch, $this->arrParametersUrl, $this->orderFieldDefaultForSearch, $this->orderDirectionDefaultForSearch);

			// cria paginação e limite de registros
			$pagination = new CPagination( $model->count($this->criteriaForSearch) );
			$pagination->setCurrentPage($this->formSearch->page-1);
			$pagination->setPageSize($this->arrRowCount[$this->formSearch->rowCount]);

            $this->criteriaForSearch->offset = ($pagination->getCurrentPage() * $pagination->getPageSize());
            $this->criteriaForSearch->limit  = $pagination->getPageSize();

			$pagination->params = $this->arrParametersUrl;

			// cria objeto para o form
			$list = $model->findAll($this->criteriaForSearch);
			
			// dados a serem renderizados
			$this->renderData = array(
				'moduleTitle'       => $this->moduleTitle,
				'form'              => $this->formSearch,
				'list'              => $list,
				'arrOrderField'     => $this->arrOrderField,
				'arrOrderDirection' => $this->arrOrderDirection,
				'arrRowCount'       => $this->arrRowCount,
				'pagination'        => $pagination,
			);
			
			if ($this->afterActionIndex())
			{
				$this->render($this->getAction()->getId(), $this->renderData);
			}
		}
	}
    	
    public function actionView()
	{
		if ($this->beforeActionView() == true)
		{
	
			// recebe ID do registro
			$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;   
        
			// verifica se é um registro válido
			if ($id <= 0) 
			{
				UserUtil::getAdminWebUser()->setFlash(Constants::ERROR_MESSAGE_ID, ConstantMessages::invalidRegistry());
				$this->redirect(array('/admin/' . $this->getId()));            
			}
			else
			{
				// tenta instanciar objeto pelo ID recebido
				$model = new $this->model;
                $this->modelForView = $model->findByPk($id);

				if (!$this->modelForView)
				{
					UserUtil::getAdminWebUser()->setFlash(Constants::ERROR_MESSAGE_ID, ConstantMessages::invalidRegistry());
					$this->redirect(array('/admin/' . $this->getId()));                    
				} 
				else
				{
                    $this->modelForView->clearErrors();
					
					$this->renderData = array(
						'moduleTitle' => $this->moduleTitle,
						'model'       => $this->modelForView,
					);
					
					if ($this->afterActionView() == true)
					{
						$this->render($this->getAction()->getId(), $this->renderData);
					}
				}
			}
			
		}
    }
	    
    public function actionAdd()
	{
		$this->modelForSave     = new $this->model;
		$this->formModelForSave = new $this->formModel;
			
		if ($this->beforeActionAdd() == true)
		{

			if ($this->getFormData() != null)
			{
				$this->formModelForSave->setAttributes($this->getFormData());

				if ($this->formModelForSave->validate())
				{
					$this->modelForSave->setAttributes($this->formModelForSave->getAttributes());

					if ($this->beforeSaveModel())
					{
						$this->modelForSave->save();

						if ($this->afterSaveModel())
						{
							UserUtil::getAdminWebUser()->setFlash(Constants::SUCCESS_MESSAGE_ID, ConstantMessages::addedRegistry($this->modelForSave->id));
							$this->redirect(array('/admin/' . $this->getId()));
						}
					}
				}
			}
			else
			{
				$this->formModelForSave->clearErrors();
			}

			$this->renderData = array(
				'moduleTitle' => $this->moduleTitle,
				'form'        => $this->formModelForSave,
				'model'       => $this->modelForSave,
			);

			if ($this->afterActionAdd() == true)
			{
				$this->render($this->getAction()->getId(), $this->renderData);
			}
			
		}
    }
    
    public function actionUpdate()
	{
		$this->formModelForUpdate = new $this->formModel;
		$this->modelForUpdate = null;
			
		if ($this->beforeActionUpdate() == true)
		{
		
			if ($this->getFormData() != null)
			{
				$this->formModelForUpdate->setAttributes($this->getFormData());
				$this->modelForUpdate = new $this->model;
				$this->modelForUpdate = $this->modelForUpdate->findByPk($this->formModelForUpdate->id);

				if ($this->formModelForUpdate->validate())
				{
					$this->modelForUpdate->setAttributes($this->getFormData());
					
					if ($this->beforeUpdateModel())
					{
						$this->modelForUpdate->update();
						
						if ($this->afterUpdateModel())
						{
							UserUtil::getAdminWebUser()->setFlash(Constants::SUCCESS_MESSAGE_ID, ConstantMessages::updatedRegistry($this->modelForUpdate->id));
							$this->redirect(array('/admin/' . $this->getId()));							
						}
					}
				}
			}
			else
			{
				// verifica se é um registro válido
				$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

				if ($id <= 0)
				{
					UserUtil::getAdminWebUser()->setFlash(Constants::ERROR_MESSAGE_ID, ConstantMessages::invalidRegistry());
					$this->redirect(array('/admin/' . $this->getId()));
				}
				else
				{
					// tenta instanciar objeto pelo ID recebido
					$this->modelForUpdate = new $this->model;
					$this->modelForUpdate = $this->modelForUpdate->findByPk($id);

					if (!$this->modelForUpdate)
					{
						UserUtil::getAdminWebUser()->setFlash(Constants::ERROR_MESSAGE_ID, ConstantMessages::invalidRegistry());
						$this->redirect(array('/admin/' . $this->getId()));
					}
					else
					{
						$this->formModelForUpdate->setAttributes($this->modelForUpdate->getAttributes());
						$this->formModelForUpdate->validate();
					}
				}
			}
			
			$this->renderData = array(
				'moduleTitle' => $this->moduleTitle,
				'form'        => $this->formModelForUpdate,
				'model'       => $this->modelForUpdate,
			);
			
			if ($this->afterActionUpdate() == true)
			{
				$this->render($this->getAction()->getId(), $this->renderData);
			}
			
		}
    }
	    
    public function actionDelete()
	{
        // verifica se é para exclui registros selecionados via checkbox
        if (isset($_POST['chkRow']) && count($_POST['chkRow']) > 0)
        {
            foreach($_POST['chkRow'] as $id)
            {
            	$model = new $this->model;
				$model = $model->findByPk($id);
			
                if ($model)
                {
                    $result = $model->canModifyOrDelete();

					if ($result['success'] == false)
					{
						UserUtil::getAdminWebUser()->setFlash(Constants::ERROR_MESSAGE_ID, ConstantMessages::cannotModiyOrDelete($model->id, $result['message']));
						$this->redirect(array('/admin/' . $this->getId()));
						Yii::app()->end();
					}
					else
					{
						$model->delete();
					}
                }
            }

            UserUtil::getAdminWebUser()->setFlash(Constants::SUCCESS_MESSAGE_ID, ConstantMessages::deletedRegistries());
            $this->redirect(array('/admin/' . $this->getId()));
        }

        // recebe ID do registro
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        // verifica se é um registro válido
        if ($id <= 0)
        {
            UserUtil::getAdminWebUser()->setFlash(Constants::ERROR_MESSAGE_ID, ConstantMessages::invalidRegistry());
            $this->redirect(array('/admin/' . $this->getId()));
        }
        else
        {
            // tenta instanciar objeto pelo ID recebido
            $model = new $this->model;
			$model = $model->findByPk($id);
			

            if (!$model)
            {
                UserUtil::getAdminWebUser()->setFlash(Constants::ERROR_MESSAGE_ID, ConstantMessages::invalidRegistry());
                $this->redirect(array('/admin/' . $this->getId()));
            }
            else
            {
                $result = $model->canModifyOrDelete();

				if ($result['success'] == false)
				{
					UserUtil::getAdminWebUser()->setFlash(Constants::ERROR_MESSAGE_ID, ConstantMessages::cannotModiyOrDelete($model->id, $result['message']));
					$this->redirect(array('/admin/' . $this->getId()));
					Yii::app()->end();
				}
				else
				{
					$model->delete();
				}

                UserUtil::getAdminWebUser()->setFlash(Constants::SUCCESS_MESSAGE_ID, ConstantMessages::deletedRegistry());
                $this->redirect(array('/admin/' . $this->getId()));
            }
        }
    }
	
	protected function createParameters()
	{
		
	}
	
	protected function addToRenderData($key, $value)
	{
		$this->renderData = array_merge($this->renderData, array($key => $value));
	}
		
	protected function beforeActionIndex()
	{
		return true;
	}
	
	protected function afterActionIndex()
	{
		return true;
	}
		
	protected function beforeActionView()
	{
		return true;
	}
	
	protected function afterActionView()
	{
		return true;
	}
		
	protected function beforeActionAdd()
	{
		return true;
	}
	
	protected function afterActionAdd()
	{
		return true;
	}
	
	protected function beforeActionUpdate()
	{
		return true;
	}
	
	protected function afterActionUpdate()
	{
		return true;
	}
	
	protected function beforeSaveModel()
	{
		return true;
	}
	
	protected function afterSaveModel()
	{
		return true;
	}
	
	protected function beforeUpdateModel()
	{
		return true;
	}
	
	protected function afterUpdateModel()
	{
		return true;
	}
	
	protected function getFormData()
	{
		return isset($_POST[$this->formModel]) ? $_POST[$this->formModel] : null;
	}

}