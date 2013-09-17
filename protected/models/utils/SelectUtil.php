<?php

class SelectUtil
{

	public static function createSelectState($model, $fieldName = 'addressState')
	{
		$states = array('AC'=>'Acre', 'AL'=>'Alagoas', 'AM'=>'Amazonas', 'AP'=>'Amapá','BA'=>'Bahia','CE'=>'Ceará','DF'=>'Distrito Federal','ES'=>'Espírito Santo','GO'=>'Goiás','MA'=>'Maranhão','MT'=>'Mato Grosso','MS'=>'Mato Grosso do Sul','MG'=>'Minas Gerais','PA'=>'Pará','PB'=>'Paraíba','PR'=>'Paraná','PE'=>'Pernambuco','PI'=>'Piauí','RJ'=>'Rio de Janeiro','RN'=>'Rio Grande do Norte','RO'=>'Rondônia','RS'=>'Rio Grande do Sul','RR'=>'Roraima','SC'=>'Santa Catarina','SE'=>'Sergipe','SP'=>'São Paulo','TO'=>'Tocantins');

		foreach($states as $key => $value)
		{
			$data[] = array('key' => $key, 'value' => $value);
		}

		$list = CHtml::listData($data, 'key', 'value');
		return CHtml::activeDropDownList($model, $fieldName, $list, array(Constants::EMPTY_ID => Constants::EMPTY_TEXT));
	}

    public static function createSelectActive($model, $fieldName = 'active')
    {
        $data       = array();
        $activeList = array(Constants::YES_ID => Constants::YES_TEXT, Constants::NO_ID => Constants::NO_TEXT);

        foreach($activeList as $key => $value)
        {
            $data[] = array('key' => $key, 'value' => $value);
        }

        $list = CHtml::listData($data, 'key', 'value');
        return CHtml::activeDropDownList($model, $fieldName, $list, array(Constants::EMPTY_ID => Constants::EMPTY_TEXT));
    }

    public static function createSelectDays($model)
    {
        $data = array();

        for($x = 1; $x <= 30; $x++)
        {
            $temp = ($x == 1 ? 'dia' : 'dias');
            $data[] = array('key' => $x, 'value' => $x . ' ' . $temp);
        }

        $list = CHtml::listData($data, 'key', 'value');

        return CHtml::activeDropDownList($model, 'bitnetDays', $list, array(Constants::EMPTY_ID => Constants::EMPTY_TEXT));
    }

    public static function createSelectHours($model, $field)
    {
        $data = array();

        for($x = 0; $x <= 23; $x++)
        {
            $temp = ($x == 1 ? 'hora' : 'horas');
            $data[] = array('key' => $x, 'value' => $x . ' ' . $temp);
        }

        $list = CHtml::listData($data, 'key', 'value');

        return CHtml::activeDropDownList($model, $field, $list, array(Constants::EMPTY_ID => Constants::EMPTY_TEXT));
    }

    public static function createSelectMinutes($model, $field)
    {
        $data = array();

        for($x = 0; $x <= 59; $x++)
        {
            $temp = ($x == 1 ? 'minuto' : 'minutos');
            $data[] = array('key' => $x, 'value' => $x . ' ' . $temp);
        }

        $list = CHtml::listData($data, 'key', 'value');

        return CHtml::activeDropDownList($model, $field, $list, array(Constants::EMPTY_ID => Constants::EMPTY_TEXT));
    }

    public static function createSelectSeconds($model, $field)
    {
        $data = array();

        for($x = 0; $x <= 59; $x++)
        {
            $temp = ($x == 1 ? 'segundo' : 'segundos');
            $data[] = array('key' => $x, 'value' => $x . ' ' . $temp);
        }

        $list = CHtml::listData($data, 'key', 'value');

        return CHtml::activeDropDownList($model, $field, $list, array(Constants::EMPTY_ID => Constants::EMPTY_TEXT));
    }

    public static function createSelectHoursNumber($model, $field)
    {
        $data = array();

        for($x = 0; $x <= 23; $x++)
        {
            $temp = ($x < 10 ? '0' : '');
            $data[] = array('key' => $temp.$x, 'value' => $temp.$x);
        }

        $list = CHtml::listData($data, 'key', 'value');

        return CHtml::activeDropDownList($model, $field, $list, array(Constants::EMPTY_ID => Constants::EMPTY_TEXT));
    }

    public static function createSelectMinutesNumber($model, $field)
    {
        $data = array();

        for($x = 0; $x <= 59; $x++)
        {
            $temp = ($x < 10 ? '0' : '');
            $data[] = array('key' => $temp.$x, 'value' => $temp.$x);
        }

        $list = CHtml::listData($data, 'key', 'value');

        return CHtml::activeDropDownList($model, $field, $list, array(Constants::EMPTY_ID => Constants::EMPTY_TEXT));
    }

    public static function createSelectSecondsNumber($model, $field)
    {
        $data = array();

        for($x = 0; $x <= 59; $x++)
        {
            $temp = ($x < 10 ? '0' : '');
            $data[] = array('key' => $temp.$x, 'value' => $temp.$x);
        }

        $list = CHtml::listData($data, 'key', 'value');

        return CHtml::activeDropDownList($model, $field, $list, array(Constants::EMPTY_ID => Constants::EMPTY_TEXT));
    }

}