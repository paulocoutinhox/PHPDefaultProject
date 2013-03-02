<?php

class ContactController extends SiteController
{

	public function actionIndex()
	{
		$form  = new ContactForm();
		$data  = Yii::app()->request->getParam(get_class($form));
		$model = Content::model()->findByAttributes(array('tag' => 'contact'));
		
		if ($model == null)
		{
			UserUtil::getDefaultWebUser()->setFlash(Constants::ERROR_MESSAGE_ID, 'Tag não encontrada.');
			$this->redirect(array('/home'));
		}
		
		if ($data)
		{
			$form->setAttributes($data);
			
			$validate = $form->validate();

			if($validate)
			{
				Util::configureMailer();

				Yii::app()->mailer->Subject = $model->title;
				Yii::app()->mailer->getView('contact', array(
					'form'  => $form,
					'model' => $model,
				));
				Yii::app()->mailer->AddAddress(Yii::app()->params['adminEmail']);

				if(!Yii::app()->mailer->Send())
				{
					Yii::trace('Erro ao enviar email (' . Yii::app()->mailer->ErrorInfo . ')');
				}
				
				UserUtil::getDefaultWebUser()->setFlash(Constants::SUCCESS_MESSAGE_ID, 'Sua mensagem foi enviada com sucesso.');
                $this->redirect(array('/home'));
			}
			
		}

        $this->render($this->getAction()->getId(), array(
			'form'  => $form,
			'model' => $model,
		));
	}

}