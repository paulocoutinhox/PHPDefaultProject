<?php

class UsersController extends AdminFormController
{
	protected $moduleTitle    = 'Usuários';
	protected $formModel      = 'AdminFormUser';
	protected $formSearchModel = 'AdminFormSearchUser';
	protected $model          = 'User';

    public function actionIndex()
	{
		$this->orderFieldsForSearch = array(
			'id'     => 'código',
			'name'   => 'nome',
			'email'  => 'email',
			'active' => 'ativo',
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
                
        if ($this->formSearch->name && trim($this->formSearch->name) != '')
        {
            $this->arrConditions[]  = 'name LIKE :name';
            $this->arrParameters    = array_merge($this->arrParameters, array(':name' => '%' . $this->formSearch->name . '%'));
            $this->arrParametersUrl = array_merge($this->arrParametersUrl, array('name' => $this->formSearch->name));
        }
		
		if ($this->formSearch->email && trim($this->formSearch->email) != '')
        {
            $this->arrConditions[]  = 'email LIKE :email';
            $this->arrParameters    = array_merge($this->arrParameters, array(':email' => '%' . $this->formSearch->email . '%'));
            $this->arrParametersUrl = array_merge($this->arrParametersUrl, array('email' => $this->formSearch->email));
        }
		
		if ($this->formSearch->active && trim($this->formSearch->active) != '')
        {
            $this->arrConditions[]  = 'active = :active';
            $this->arrParameters    = array_merge($this->arrParameters, array(':active' => $this->formSearch->active));
            $this->arrParametersUrl = array_merge($this->arrParametersUrl, array('active' => $this->formSearch->active));
        }
	}
	
	protected function afterActionView()
	{
		// obtém grupos
		$groups = Group::model()->active()->orderByDescription()->findAll();
		
		$this->renderData = array_merge($this->renderData, array(
			'groups' => $groups,
		));

		return true;
	}
	
	protected function afterActionUpdate()
	{
		// obtém grupos
		$groups = Group::model()->active()->orderByDescription()->findAll();
		
		$this->renderData = array_merge($this->renderData, array(
			'groups' => $groups,
		));

		return true;
	}
	
    public function actionAdd()
	{
        $form = new $this->formModel;
                
        if ($this->getFormData() != null)
        {
            $form->setAttributes($this->getFormData());

            if ($form->validate())
            {
                $model = new $this->model;
                $model->setAttributes($form->getAttributes());
				$model->password = $model->hashPassword($form->password, $model->getSalt());
				$model->save();

				// atualiza os grupos
                User::clearGroups($model->id);
                User::addGroup($model->id, (isset($_POST['groups']) ? $_POST['groups'] : array()));

                UserUtil::getAdminWebUser()->setFlash(Constants::SUCCESS_MESSAGE_ID, ConstantMessages::addedRegistry($model->id));
                $this->redirect(array('/admin/' . $this->getId()));
            }
        }
        else
        {
            $form->active = Constants::YES_ID;
			$form->root   = Constants::NO_ID;
			$form->clearErrors();
        }

		// obtém grupos
        $groups = Group::model()->active()->orderByDescription()->findAll();
		
		$this->renderData = array(
			'moduleTitle' => $this->moduleTitle,
			'form'        => $form,			
			'groups'      => $groups,
		);
		
		$this->render($this->getAction()->getId(), $this->renderData);
    }
    
    public function actionUpdate()
	{
		$form  = new AdminFormUser();
        $model = null;
		
		if ($this->getFormData() != null)
        {
            $form->setAttributes($this->getFormData());
            $model = User::model()->findByPk($form->id);

            if ($form->validate())
            {
                $oldPassword = $model->password;
				
				$model->setAttributes($this->getFormData());

				if ($form->password != '')
                {
                    $model->password = $model->hashPassword($form->password, $model->getSalt());
                }
				else
				{
					$model->password = $oldPassword;
				}

                $model->update();

				// atualiza os grupos
                User::clearGroups($model->id);
                User::addGroup($model->id, (isset($_POST['groups']) ? $_POST['groups'] : array()));

                UserUtil::getAdminWebUser()->setFlash(Constants::SUCCESS_MESSAGE_ID, ConstantMessages::updatedRegistry($model->id));
                $this->redirect(array('/admin/' . $this->getId()));							
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
                $model = User::model()->findByPk($id);
				
                if (!$model)
                {
                    UserUtil::getAdminWebUser()->setFlash(Constants::ERROR_MESSAGE_ID, ConstantMessages::invalidRegistry());
                    $this->redirect(array('/admin/' . $this->getId()));
                }
                else
                {
                    $form->setAttributes($model->getAttributes());

					$form->password         = '';
                    $form->repeat_password  = '';

					$form->validate();
                }
            }
        }

		// obtém grupos
        $groups = Group::model()->active()->orderByDescription()->findAll();

		$this->render($this->getAction()->getId(), array(
			'moduleTitle' => $this->moduleTitle,
			'form' => $form,
			'model' => $model,
			'groups' => $groups,
		));
    }
    
}