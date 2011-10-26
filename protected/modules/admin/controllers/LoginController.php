<?php

class LoginController extends AdminController
{
    public $layout = 'login';
    
    public function actionIndex()
    {
        $form = new AdminLoginForm();
        $data = Yii::app()->request->getPost(get_class($form));
		
        if($data)
        {
            $form->attributes = $data;

            if($form->validate())
            {
                UserUtil::getAdminWebUser()->setFlash(Constants::SUCCESS_MESSAGE_ID, 'Login efetuado com sucesso.');
                $this->redirect(array('/admin'));
            }
        }

        $this->render($this->getAction()->getId(), array('form' => $form));
    }

    public function actionLogout()
    {
        UserUtil::getAdminWebUser()->logout();
        $this->redirect(array('/admin/login'));
    }
    
}
