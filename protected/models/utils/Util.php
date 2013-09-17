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

	public static function removeAccentuation($string)
	{
		$a = array('À','Á','Â','Ã','Ä','Å','Æ','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ð','Ñ','Ò','Ó','Ô','Õ','Ö','Ø','Ù','Ú','Û','Ü','Ý','ß','à','á','â','ã','ä','å','æ','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ø','ù','ú','û','ü','ý','ÿ','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?');
		$b = array('A','A','A','A','A','A','AE','C','E','E','E','E','I','I','I','I','D','N','O','O','O','O','O','O','U','U','U','U','Y','s','a','a','a','a','a','a','ae','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','o','u','u','u','u','y','y','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','D','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','IJ','ij','J','j','K','k','L','l','L','l','L','l','L','l','l','l','N','n','N','n','N','n','n','O','o','O','o','O','o','OE','oe','R','r','R','r','R','r','S','s','S','s','S','s','S','s','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Y','Z','z','Z','z','Z','z','s','f','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','A','a','AE','ae','O','o');
		return str_replace($a, $b, $string);
	}

	public static function excerpt($text, $maxchars)
	{
		if(strlen($text) <= $maxchars)
		{
			return $text;
		}

		$text = substr($text, 0, $maxchars);
		$position = strrpos($text, " ");

		if($position > 0)
		{
			$text = substr($text, 0, $position);
		}
		return $text;
	}

    public static function formatToCurrency($value, $convertToDataBase = false)
    {
        if ($convertToDataBase == true)
        {
            $value = self::formatNumberToDatabase($value);
        }

        return 'R$ ' . Yii::app()->numberFormatter->format(Yii::app()->params['currencyFormat'], $value);
    }

    public static function formatToNumber($value, $convertToDataBase = false)
    {
        if ($convertToDataBase == true)
        {
            $value = self::formatNumberToDatabase($value);
        }

        return Yii::app()->numberFormatter->format(Yii::app()->params['currencyFormat'], $value);
    }

    public static function formatToPercentage($value, $convertToDataBase = false)
    {
        if ($convertToDataBase == true)
        {
            $value = self::formatNumberToDatabase($value);
        }

        return Yii::app()->numberFormatter->format(Yii::app()->params['percentFormat'], $value);
    }

    public static function formatDateToDatabase($value)
    {
        return date('Y-m-d', CDateTimeParser::parse($value, Yii::app()->locale->dateFormat));
    }

    public static function formatDateToDatabaseDefinePeriod($value, $period)
    {
        return date("Y-m-d", strtotime($value . $period));
    }

    public static function getDateDiffInDays($dateBegin, $dateEnd)
    {
        $datetime1 = new DateTime(self::formatDateToDatabase($dateBegin));
        $datetime2 = new DateTime(self::formatDateToDatabase($dateEnd));
        $interval = $datetime1->diff($datetime2);
        return $interval->format('%a');
    }

    public static function formatDatetimeToDatabaseDefinePeriod($value, $period)
    {
        return date("Y-m-d H:i:s", strtotime($value . $period));
    }

    public static function getDaysBetweenTwoDates($start_date, $end_date, $include_dates = true)
    {
        $days = array();

        $str_start_date = strtotime($start_date);
        $str_end_date = strtotime($end_date);

        if($str_start_date == false || $str_end_date == false || $str_start_date > $str_end_date) return false;

        $current_date = date("Y-m-d", $str_start_date);
        $end_date = date("Y-m-d", $str_end_date);

        do
        {
            $days[] = $current_date;
            //$current_date = date("Y-m-d", strtotime("+1 day", strtotime($current_date)));
            //$next_day = (strtotime($current_date) + (24 * 60 * 60));
            $next_day = strtotime("+1 day", strtotime($current_date));
            $current_date = date("Y-m-d", $next_day);

        }
        while($current_date <= $end_date);

        if(!$include_dates)
        {
            unset($days[0]);
            array_pop($days);
            $days = array_values($days);
        }

        return $days;
    }

    public static function formatZipCode($value)
    {
        return Util::formatWithMask($value, '#####-###');
    }

    public static function random($type = 'sha1', $len = 20)
    {
        if (phpversion() >= 4.2)
        {
            mt_srand();
        }
        else
        {
            mt_srand(hexdec(substr(md5(microtime()), - $len)) & 0x7fffffff);
        }

        switch ($type)
        {
            case 'basic':
                return mt_rand();
                break;
            case 'alpha':
            case 'numeric':
            case 'nozero':
                switch ($type) {
                    case 'alpha':
                        $param = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        break;
                    case 'numeric':
                        $param = '0123456789';
                        break;
                    case 'nozero':
                        $param = '123456789';
                        break;
                }
                $str = '';
                for ($i = 0; $i < $len; $i ++)
                {
                    $str .= substr($param, mt_rand(0, strlen($param) - 1), 1);
                }
                return $str;
                break;
            case 'md5':
                return md5(uniqid(mt_rand(), TRUE));
                break;
            case 'sha1':
                return sha1(uniqid(mt_rand(), TRUE));
                break;
        }
    }

    public static function calculateParcelValues($price, $parcels, $tax, $minParcel)
    {
        $result = array();

        for ($x = 2; $x <= $parcels; $x++)
        {
            $totalValue = $price * (pow(1 + ($tax/ 100), $x));
            $parcelValue = $totalValue / $x;

            if($parcelValue < $minParcel)
            {
                break;
            }

            $result[] = array('parcel' => ($x), 'price' => $parcelValue, 'total' => $totalValue);
        }

        return $result;
    }

    public static function requireAllFilesFromPath($path)
    {
        $files = Util::listAllFilesFromFolder($path);
        $path  = rtrim($path, '\\/');

        foreach ($files as $file)
        {
            if (substr($file, -10) == '.class.php')
            {
                echo("Foi: $file <br />");
                require_once($path . '/' . $file);
            }
        }

        foreach ($files as $file)
        {
            if (substr($file, -4) == '.php')
            {
                echo("Foi: $file <br />");
                require_once($path . '/' . $file);
            }
        }
    }

    public static function listAllFilesFromFolder($dir, $prefix = '')
    {
        $dir    = rtrim($dir, '\\/');
        $result = array();

        foreach (scandir($dir) as $f)
        {
            if ($f !== '.' and $f !== '..')
            {
                if (is_dir("$dir/$f")) {
                    $result = array_merge($result, Util::listAllFilesFromFolder("$dir/$f", "$prefix$f/"));
                }
                else
                {
                    $result[] = $prefix.$f;
                }
            }
        }

        return $result;
    }

    public static function isValidPhoneNumber($phone)
    {
        // verifica se o número digitado contém todos os digitos
        $phone = Util::onlyNumbers($phone);

        // verifica o tamanho do número do telefone
        if (strlen($phone) >= 10 && strlen($phone) <= 11)
        {
            return true;
        }

        // verifica se é um número válido
        $expression = '/(10|([1-9][1-9]))[2-9][0-9]{7,8}/i';
        return (preg_match($expression, $phone));
    }

    public static function xml2array($xml)
    {
        $xmlary = array();

        $reels = '/<(\w+)\s*([^\/>]*)\s*(?:\/>|>(.*)<\/\s*\\1\s*>)/s';
        $reattrs = '/(\w+)=(?:"|\')([^"\']*)(:?"|\')/';

        preg_match_all($reels, $xml, $elements);

        foreach ($elements[1] as $ie => $xx)
        {
            $xmlary[$ie]["name"] = $elements[1][$ie];

            if ($attributes = trim($elements[2][$ie])) {
                preg_match_all($reattrs, $attributes, $att);
                foreach ($att[1] as $ia => $xx)
                    $xmlary[$ie]["attributes"][$att[1][$ia]] = $att[2][$ia];
            }

            $cdend = strpos($elements[3][$ie], "<");
            if ($cdend > 0) {
                $xmlary[$ie]["text"] = substr($elements[3][$ie], 0, $cdend - 1);
            }

            if (preg_match($reels, $elements[3][$ie]))
                $xmlary[$ie]["elements"] = Util::xml2array($elements[3][$ie]);
            else if ($elements[3][$ie]) {
                $xmlary[$ie]["text"] = $elements[3][$ie];
            }
        }

        return $xmlary;
    }

    public static function formatPtDateToDataBase($date)
    {
        $dateArr = explode('/', $date);

        if (count($dateArr) == 3)
        {
            return $dateArr[2] . '-' . $dateArr[1] . '-' . $dateArr[0];
        }

        return null;
    }

    public static function formatDateTimeToDatabase($dateTime, $isTimeStamp = false)
    {
        if (empty($dateTime) || $dateTime == '0000-00-00 00:00:00' || $dateTime == '00/00/0000 00:00:00' || $dateTime == '00/00/0000 às 00:00:00')
        {
            return null;
        }

        if ($isTimeStamp)
        {
            return date('Y-m-d H:i:s', $dateTime);
        }

        return date('Y-m-d H:i:s', CDateTimeParser::parse($dateTime, 'dd/MM/yyyy HH:mm:ss'));
    }

    public static function formatDatabaseDateTimeToDate($date, $isTimeStamp = false)
    {
        if (empty($dateTime) || $dateTime == '0000-00-00 00:00:00' || $dateTime == '00/00/0000 00:00:00' || $dateTime == '00/00/0000 às 00:00:00')
        {
            return null;
        }

        if ($isTimeStamp)
        {
            return date('Y-m-d', $date);
        }

        return date('Y-m-d', strotime($dateTime));
    }

    public static function formatDateTime($dateTime, $isTimeStamp = false)
    {
        if (empty($dateTime) || $dateTime == '0000-00-00 00:00:00' || $dateTime == '00/00/0000 00:00:00' || $dateTime == '00/00/0000 às 00:00:00')
        {
            return null;
        }

        if ($isTimeStamp)
        {
            return date('d/m/Y \à\s H:i:s', $dateTime);
        }

        return date('d/m/Y \à\s H:i:s', strtotime($dateTime));
    }

    public static function formatDate($date, $isTimeStamp = false)
    {
        if (empty($date) || $date == '0000-00-00' || $date == '00/00/0000')
        {
            return null;
        }

        if ($isTimeStamp)
        {
            return date('d/m/Y', $date);
        }

        return date('d/m/Y', strtotime($date));
    }

}