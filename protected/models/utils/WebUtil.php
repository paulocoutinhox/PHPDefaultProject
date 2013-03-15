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

}