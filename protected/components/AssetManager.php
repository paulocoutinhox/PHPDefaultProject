<?php

class AssetManager extends CAssetManager
{
	protected $_baseUrl;

	public function getBaseUrl()
	{
		if($this->_baseUrl===null)
		{
			$request=Yii::app()->getRequest();
			$this->_baseUrl = $request->getBaseUrl().'/public/'.self::DEFAULT_BASEPATH;
		}
		return $this->_baseUrl;
	}
}