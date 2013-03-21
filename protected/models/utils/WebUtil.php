<?php

class WebUtil
{

	public static function getRemoteIP()
	{
		$remoteIP = null;

		if (isset(Yii::app()->params['useCloudFlareIP']) && Yii::app()->params['useCloudFlareIP'] == true)
		{
			$remoteIP = $_SERVER["REMOTE_ADDR"] = $_SERVER["HTTP_CF_CONNECTING_IP"];
		}
		else
		{
			if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
			{
				$remoteIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
			}
			else
			{
				$remoteIP = $_SERVER['REMOTE_ADDR'];
			}
		}

		$remoteIPLong = ip2long($remoteIP);

		if($remoteIPLong == NULL)
		{
			$remoteIPLong = 0;
		}

		$remoteIPUnsignedLong = sprintf('%u', $remoteIPLong);

		return array(
			'removeIP'             => $remoteIP,
			'remoteIPLong'         => $remoteIPLong,
			'remoteIPUnsignedLong' => $remoteIPUnsignedLong,
		);
	}

	public static function slugUrl($url, $excerpt = false)
	{
		// clean and Remove accentuation
		$url = trim($url);
		$url = removeAccentuation($url);
		// excerpt before slug string
		if ($excerpt !== false)
		{
			$url = excerpt($url, $excerpt);
		}
		// unwanted:  {UPPERCASE} ; / ? : @ & = + $ , . ! ~ * ' ( )
		$url = strtolower($url);
		// strip any unwanted characters
		$url = preg_replace("/[^a-z0-9_\s-]/", "", $url);
		// clean multiple dashes or whitespaces
		$url = preg_replace("/[\s-]+/", " ", $url);
		// convert whitespaces and underscore to dash
		$url = preg_replace("/[\s_]/", "-", $url);

		return $url;
	}

}