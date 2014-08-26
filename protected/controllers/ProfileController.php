<?php

class ProfileController extends SiteController
{

    protected $requiredAuth = true;

	public function actionIndex()
	{
		$this->render($this->getAction()->getId(), array());
	}
	
	public function actionUpdate()
	{
		$form     = new CustomerProfileUpdateForm();
		$model    = Customer::model()->findByPk(Yii::app()->user->id);
		$data     = Yii::app()->request->getPost(get_class($form));
		$validate = null;
		
		Yii::trace('Verificando se o formulário de alteração de perfil foi enviado...');
		
		if ($data)
		{
			Yii::trace('Definindo atributos do perfil do usuário...');
			
			$form->setAttributes($data);
			
			Yii::trace('Validando dados do novo perfil...');
			
			$validate = $form->validate();
			
			if ($validate == true)
			{
				$model->setAttributes($data);
				$model->update($form->getUpdatableFields());
				
				Yii::trace('Perfil alterado com sucesso.');
				Yii::app()->user->setFlash(Constants::SUCCESS_MESSAGE_ID, 'Seu perfil foi alterado com sucesso.');
			}
			else
			{
				Yii::trace('Dados do novo perfil do usuário invalidos.');
			}
		}
		else
		{
			Yii::trace('Definindo dados do formulário sendo os dados do modelo do usuário.');
			$form->setAttributes($model->getAttributes());
		}
		
		$this->render($this->getAction()->getId(), array(
			'model' => $form,
		));
	}

}