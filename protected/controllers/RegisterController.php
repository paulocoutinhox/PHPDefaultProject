<?php

class RegisterController extends SiteController
{

    public function actionIndex()
	{
		$form = new Customer();
        $form->scenario = 'register';

		$data = Yii::app()->request->getPost(get_class($form));

		Yii::trace('Verificando se o formulário de novo usuário foi enviado...');
		
		if ($data)
		{
			Yii::trace('Definindo atributos do novo usuário...');

            $form->setAttributes($data);

            $token = Util::generateToken();
            $form->status           = Customer::STATUS_NOT_VERIFIED;
            $form->activation_token = $token;
            $form->created_at       = new CDbExpression('NOW()');

            Yii::trace('Validando dados do novo usuário...');

			$validate = $form->validate();

			if ($validate == true)
			{
                $form->save();

				Util::configureMailer();

				Yii::app()->mailer->Subject = 'Seja bem vindo';
				Yii::app()->mailer->getView('register', array(
					'model' => $form,
					'token' => $token,
				));
				Yii::app()->mailer->AddAddress($form->email);

				if(!Yii::app()->mailer->Send())
				{
					Yii::trace('Erro ao enviar email (' . Yii::app()->mailer->ErrorInfo . ')');
				}

				Yii::trace('Novo usuário registrado.');

				Yii::app()->user->setFlash(Constants::SUCCESS_MESSAGE_ID, 'Seu cadastro foi realizado com sucesso. Em breve você receberá um e-mail para confirmar e ativar seu cadastro.');
                $this->redirect(array('/home/index'));
			}
			else
			{
				Yii::trace('Dados do novo usuário invalidos.');
			}
		}

		$this->render($this->getAction()->getId(), array(
			'form' => $form,
		));
	}
	
	public function actionActivate()
    {
        $token = Yii::app()->request->getParam('token');
		
		if (empty($token))
		{
			Yii::trace('Token não informado.');
			Yii::app()->user->setFlash(Constants::ERROR_MESSAGE_ID, 'Token inválido.');

			$this->redirect(array('/home/index'));
		}
		
		$customer = Customer::model()->withActivationToken($token)->find();
		
		if($customer)
        {
        	Yii::trace('Ativando conta: ' . $customer->email . '.');
			
			$customer->status           = Customer::STATUS_ACTIVE;
			$customer->activation_token = null;
			
			$customer->update(array('status', 'activation_token'));
					
			Yii::trace('Conta ativada com sucesso (' . $customer->email . ').');
					
			Yii::app()->user->setFlash(Constants::SUCCESS_MESSAGE_ID, 'Sua conta foi ativada com sucesso.');				
			$this->redirect(array('/home/index'));
        }
		else
		{
			Yii::app()->user->setFlash(Constants::ERROR_MESSAGE_ID, 'Token inválido ou conta já ativada.');
			
			Yii::trace('Nenhuma conta foi encontrada para ser ativada com o token: ' . $token);					
			$this->redirect(array('/home/index'));
		}
    }
	
}