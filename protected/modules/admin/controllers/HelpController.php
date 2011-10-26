<?php

class HelpController extends AdminController
{
	protected $moduleTitle = 'Ajuda';

    public function actionIndex()
	{
		$this->render('index', array(
			'moduleTitle' => $this->moduleTitle
		));
	}
}