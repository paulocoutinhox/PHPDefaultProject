<?php

class ProfileController extends AdminController
{
	protected $moduleTitle = 'Meu perfil';

    public function actionIndex()
	{
		$model = User::model()->findByPk(UserUtil::getAdminWebUser()->getId());
        $form = new AdminFormProfile();
        
        if ($this->getFormData() != null)
        {
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
                
                $model->save();
                UserUtil::getAdminWebUser()->setFlash(Constants::SUCCESS_MESSAGE_ID, ConstantMessages::profileUpdated());
                
                $form->password        = '';
                $form->repeat_password = '';
            }
        }
        else
        {
            $form->setAttributes($model->getAttributes());
            $form->password        = '';
            $form->repeat_password = '';
            $form->clearErrors();
        }
                
        $this->render('index', array('moduleTitle' => $this->moduleTitle,
                                     'form' => $form,                                     
                                    ));        
	}

	private function getFormData()
	{
		return isset($_POST['AdminFormProfile']) ? $_POST['AdminFormProfile'] : null;
	}
}