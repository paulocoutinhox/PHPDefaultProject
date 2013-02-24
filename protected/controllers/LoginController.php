<?php

class LoginController extends SiteController
{
	
    public function actionIndex()
    {
        $form = new CustomerLoginForm();        
		$data = Yii::app()->request->getPost(get_class($form));
		
		if($data)
        {
            $form->attributes = $data;
			
			Yii::trace('Tentando efetuar login com o usuário: ' . $form->username . '.');
			
			$validate = $form->validate();
			
            if($validate)
            {
                Yii::trace('Login efetuado com sucesso (' . $form->username . ').');
				
				UserUtil::getDefaultWebUser()->setFlash(Constants::SUCCESS_MESSAGE_ID, 'Login efetuado com sucesso.');
				$this->redirect(array('/default'));
            }
			else
			{
				Yii::trace('Erro ao efetuar login com o usuário: ' . $form->username . '.');
			}
        }

        $this->render($this->getAction()->getId(), array(
			'form' => $form,
		));
    }
	
    public function actionLogout()
    {
        UserUtil::getDefaultWebUser()->logout();
        $this->redirect(array('/default'));
    }
    
}
