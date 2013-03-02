<?php

class RecoveryPasswordController extends SiteController
{
	
    public function actionIndex()
    {
        $form     = new CustomerRecoveryPasswordForm();        
		$data     = Yii::app()->request->getPost(get_class($form));
		$validade = null;
		$token    = Yii::app()->request->getParam('token');
		
		if (empty($form->token))
		{
			$form->token = $token;
		}
		
		if($data)
        {
            $form->attributes = $data;
			
			if (empty($form->token))
			{
				Yii::trace('Token não informado.');
				UserUtil::getDefaultWebUser()->setFlash(Constants::ERROR_MESSAGE_ID, 'Token inválido.');
				
				$this->redirect(array('/home'));
			}
			
			Yii::trace('Iniciando processo de recuperação de senha: ' . $form->token . '.');
			
			$validate = $form->validate();
			
            if($validate)
            {
                $customer = Customer::model()->withRecoveryPasswordToken($form->token)->find();
				
				if ($customer)
				{
					$customer->password                = $form->password;
					$customer->recovery_password_token = null;
					$customer->update(array('password', 'recovery_password_token'));
					
					Yii::trace('Senha alterada com sucesso (' . $form->token . ').');
					
					UserUtil::getDefaultWebUser()->setFlash(Constants::SUCCESS_MESSAGE_ID, 'Sua senha foi alterada com sucesso.');				
					$this->redirect(array('/home'));
				}
				else
				{
					Yii::trace('Nenhum cliente encontrado com o token: ' . $form->token);
				}
            }
			else
			{
				Yii::trace('Erro ao tentar realizar troca de senha: ' . $form->token . '.');
			}
        }

        $this->render($this->getAction()->getId(), array(
			'form' => $form,
		));
    }
	
}