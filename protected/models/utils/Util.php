<?php

class Util
{

	public static function getCounterByTime($diff, $unit = 'a')
	{
		$days = 0;
		$hours = 0;
		$minutes = 0;
		$seconds = 0;

		if ($diff % 86400 <= 0)  // there are 86,400 seconds in a day
		{
			$days = $diff / 86400;
		}

		if($diff % 86400 > 0)
		{
			$rest = ($diff % 86400);
			$days = ($diff - $rest) / 86400;

			if( $rest % 3600 > 0 )
			{
				$rest1 = ($rest % 3600);
				$hours = ($rest - $rest1) / 3600;

				if( $rest1 % 60 > 0 )
				{
					$rest2 = ($rest1 % 60);
					$minutes = ($rest1 - $rest2) / 60;
					$seconds = $rest2;
				}
				else
				{
					$minutes = $rest1 / 60;
				}
			}
			else
			{
				$hours = $rest / 3600;
			}
		}

		switch($unit)
		{
			case 'd':
			case 'D':

				$partialDays = 0;

				$partialDays += ($seconds / 86400);
				$partialDays += ($minutes / 1440);
				$partialDays += ($hours / 24);

				$difference = $days + $partialDays;

				break;

			case 'h':
			case 'H':

				$partialHours = 0;

				$partialHours += ($seconds / 3600);
				$partialHours += ($minutes / 60);

				$difference = $hours + ($days * 24) + $partialHours;

				break;

			case 'm':
			case 'M':

				$partialMinutes = 0;

				$partialMinutes += ($seconds / 60);

				$difference = $minutes + ($days * 1440) + ($hours * 60) + $partialMinutes;

				break;

			case 's':
			case 'S':

				$difference = $seconds + ($days * 86400) + ($hours * 3600) + ($minutes * 60);

				break;

			case 'a':
			case 'A':

				$difference = array (
					"days" => $days,
					"hours" => $hours,
					"minutes" => $minutes,
					"seconds" => $seconds
				);

				break;
		}

		if ($difference && is_array($difference))
		{

			$difference['hours'] = str_pad($difference['hours'], 2, '00', STR_PAD_LEFT);
			$difference['minutes'] = str_pad($difference['minutes'], 2, '00', STR_PAD_LEFT);
			$difference['seconds'] = str_pad($difference['seconds'], 2, '00', STR_PAD_LEFT);

			if ($difference['days'] > 1)
			{
				return $difference['days'] . ' dias + ' . $difference['hours'] . ':' . $difference['minutes'] . ':' . $difference['seconds'];
			}
			else if ($difference['days'] == 1)
			{
				return $difference['days'] . ' dia + ' . $difference['hours'] . ':' . $difference['minutes'] . ':' . $difference['seconds'];
			}

			return $difference['hours'] . ':' . $difference['minutes'] . ':' . $difference['seconds'];
		}

		return $difference;
	}

	public static function getDateTimeFromDatabase()
	{
		$sql = 'SELECT NOW() AS current_date_time';

		$command = Yii::app()->db->createCommand($sql);

		return $command->queryScalar();
	}

	public static function trunkText($text, $maxchars)
	{
		if(strlen($text) <= $maxchars)
		{
			return $text;
		}

		$text = substr($text, 0, $maxchars);
		$position = strrpos($text, ' ');

		if($position > 0)
		{
			$text = substr($text, 0, $position);
		}

		return $text;
	}

	public static function getMaxDateTime()
	{
		return '9999-12-31 23:59:59';
	}

	public static function formatNumberToDatabase($number)
	{
		$number = str_replace('.', '', $number);
		$number = str_replace(',', '.', $number);
		return (float)$number;
	}

	public static function generateShareUrl($type, $shareTitle, $shareURL)
	{
		$url = '';

		switch(strtolower($type))
		{
			case 'facebook':
				$url = 'http://www.facebook.com/sharer.php?u=[url]&t=[title]';
				break;

			case 'twitter':
				$url = 'http://twitter.com/share?url=[url]';
				break;

			case 'orkut':
				$url = 'http://promote.orkut.com/preview?nt=orkut.com&du=[url]&tt=[title]&cn=';
				break;
		}

		$url = str_replace('[url]', $shareURL, $url);
		$url = str_replace('[title]', $shareTitle, $url);

		return $url;
	}

	public static function configureMailer()
	{
		Yii::app()->mailer->Host        = Yii::app()->params['mailHost'];
		Yii::app()->mailer->SMTP_PORT   = Yii::app()->params['mailPort'];
		Yii::app()->mailer->Username    = Yii::app()->params['mailUsername'];
		Yii::app()->mailer->Password    = Yii::app()->params['mailPassword'];
		Yii::app()->mailer->SMTPAuth    = Yii::app()->params['mailAuth'];
		Yii::app()->mailer->SMTPSecure  = Yii::app()->params['mailSecureMode'];
		Yii::app()->mailer->From        = Yii::app()->params['mailFromEmail'];
		Yii::app()->mailer->FromName    = Yii::app()->params['mailFromName'];
		Yii::app()->mailer->SetLanguage = Yii::app()->params['mailLanguage'];
		Yii::app()->mailer->CharSet     = Yii::app()->params['mailCharset'];;

		if (Yii::app()->params['mailSMTP'] == true)
		{
			Yii::app()->mailer->IsSMTP();
		}

		Yii::app()->mailer->isHTML(true);

	}

	public static function generateToken()
	{
		return uniqid(null, true);
	}

	public static function getDateTimeFromLocal()
	{
		return date('Y-m-d H:i:s');
	}

	public static function getFacebookPermissions()
	{
		return implode(',', Yii::app()->params['facebookPermissions']);
	}

	public static function onlyNumbers($text)
	{
		return preg_replace("/[^0-9]/", '', $text);
	}

	public static function formatCPF($value)
	{
		return Util::formatWithMask($value, '###.###.###-##');
	}

	public static function formatCNPJ($value)
	{
		return Util::formatWithMask($value, '##.###.###/####-##');
	}

	public static function formatWithMask($value, $mask, $onlyNumbers = true)
	{
		if ($onlyNumbers)
		{
			$value = Util::onlyNumbers($value);
		}

		$index = -1;

		for ($i=0; $i < strlen($mask); $i++)
		{
			if ($mask[$i] == '#')
			{
				$mask[$i] = $value[++$index];
			}
		}

		return $mask;
	}

	public static function formatPhone($value)
	{
		return '('. substr($value, 0, 2) . ") " . substr($value, 2, 4) . "-" . substr($value, 6, 5);
	}

}