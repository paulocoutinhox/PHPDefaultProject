<?php

class ModelUtil
{
	
	public static function copyField(&$modelA, $fieldA, &$modelB, $fieldB)
	{
		try
		{
			$modelB->$fieldB = $modelA->$fieldA;
		}
		catch(Exception $e)
		{
			Yii::trace('ModelUtil->copyField: Erro na atribuição de dados de ' . get_class($modelA) . '.' . $fieldA . ' para ' . get_class($modelB) . '.' . $fieldB);
		}
	}
	
}