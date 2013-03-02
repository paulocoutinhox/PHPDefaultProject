<?php

class HomeController extends SiteController
{

	public function actionIndex()
	{
		$this->render($this->getAction()->getId(), array(
			
		));
	}

}