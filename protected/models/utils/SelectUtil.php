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

}