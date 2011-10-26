<?php

class ContentController extends SiteController
{

	public function actionIndex()
	{
		$model = Content::model()->findByAttributes(array('tag' => Yii::app()->request->getParam('tag')));
		
		if ($model == null)
		{
			UserUtil::getDefaultWebUser()->setFlash(Constants::ERROR_MESSAGE_ID, 'Tag inválida.');
			$this->redirect(array('/'));
		}
		
		$this->render($this->getAction()->getId(), array(
			'model' => $model,
		));
	}

}