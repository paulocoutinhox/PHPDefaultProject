<?php

class UserUtil
{

	public static function getDefaultWebUser()
	{
		return Yii::app()->user;
	}

	public static function getAdminWebUser()
	{
		return Yii::app()->getModule(Constants::MODULE_ADMIN)->user;
	}

}