<?php

class DefaultController extends SiteController
{

	public function actionIndex()
	{
		$this->render($this->getAction()->getId(), array(
			
		));
	}

}