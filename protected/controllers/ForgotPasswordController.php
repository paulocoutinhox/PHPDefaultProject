<?php

class ForgotPasswordController extends SiteController
{
    
	public function actionIndex()
    {
        $form = new CustomerForgotPasswordForm();        
		$data = Yii::app()->request->getPost(get_class($form));
		
		if($data)
        {
            $form->attributes = $data;
			
			Yii::trace('Tentando recuperar com o email: ' . $form->email . '.');
			
			$validate = $form->validate();
			
            if($validate)
            {
				$customer = Customer::model()->findByAttributes(array('email' => $form->email));
				
				if ($customer)
				{					
					$token = Util::generateToken();
					$customer->recovery_password_token = $token;
					$customer->update(array('recovery_password_token'));
					
					Util::configureMailer();

					Yii::app()->mailer->Subject = 'Recuperação de senha';
					Yii::app()->mailer->getView('recoveryPassword', array(
						'token' => $token,
						'model' => $customer,
					));
					Yii::app()->mailer->AddAddress($customer->email);

					if(!Yii::app()->mailer->Send())
					{
						Yii::trace('Erro ao enviar email (' . Yii::app()->mailer->ErrorInfo . ')');
					}
					
					Yii::trace('Processo de recuperação de senha iniciado com sucesso (' . $form->email . ').');
					
					UserUtil::getDefaultWebUser()->setFlash(Constants::SUCCESS_MESSAGE_ID, 'As instruções para o processo de recuperação de senha foram enviadas para o e-mail informado.');
					$this->redirect(array('/home/index'));
				}
				else
				{
					Yii::trace('Processo de recuperação não pode ser iniciado, cliente não encontrado pelo email informado (' . $form->email . ').');
				}
            }
			else
			{
				Yii::trace('Erro ao recuperar senha com o email: ' . $form->email . '.');
			}
        }

        $this->render($this->getAction()->getId(), array(
			'form' => $form,
		));
    }

    public function actionLogout()
    {
        UserUtil::getDefaultWebUser()->logout();
        $this->redirect(array('/home/index'));
    }
    
}