<?php

class SiteAuthenticatedController extends SiteController
{

	public function filters()
	{
		return array_merge(parent::filters(),
			array(
				'accessControl',
			)
		);
	}

	public function filterAccessControl($filterChain)
	{
		if (UserUtil::getDefaultWebUser()->getIsGuest())
		{
			if(Yii::app()->request->isAjaxRequest)
			{
				$this->renderPartial('/shared/_blank');
				Yii::app()->end();
			}
			else
			{
				$this->redirect(array('/login'));
			}
		}

		$filterChain->run();
	}
}