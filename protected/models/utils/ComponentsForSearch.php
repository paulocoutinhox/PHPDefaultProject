<?php

class ComponentsForSearch
{

	public static function listForRowCount()
	{
		$list = array();
        $list = array_merge($list, array('10'  => '10'));
        $list = array_merge($list, array('25'  => '25'));
        $list = array_merge($list, array('50'  => '50'));
        $list = array_merge($list, array('100' => '100'));

		return $list;
	}

	public static function listForOrder()
	{
		$list = array();
        $list = array_merge($list, array(Constants::DESC_ID => Constants::DESC_TEXT));
        $list = array_merge($list, array(Constants::ASC_ID  => Constants::ASC_TEXT));

		return $list;
	}

	public static function paramsForSearchQuery($form, $criteria, &$arrParametersUrl, $defaultOrderField, $defaultOrderDirection)
	{
		if ($form->rowCount && trim($form->rowCount) != '')
        {
            $arrParametersUrl = array_merge($arrParametersUrl, array('rowCount' => $form->rowCount));
        }
        else
        {
            $form->rowCount = 0;
        }

        if ($form->orderField && trim($form->orderField) != '')
        {
            if ($form->orderDirection && trim($form->orderDirection) != '')
            {
                $criteria->order  = $form->orderField . ' ' . $form->orderDirection;
                $arrParametersUrl = array_merge($arrParametersUrl, array('orderField' => $form->orderField));
                $arrParametersUrl = array_merge($arrParametersUrl, array('orderDirection' => $form->orderDirection));
            }
            else
            {
                $criteria->order  = $form->orderField;
                $arrParametersUrl = array_merge($arrParametersUrl, array('orderField' => $form->orderField));
            }
        }
        else
        {
            $form->orderField     = $defaultOrderField;
            $form->orderDirection = $defaultOrderDirection;
            $criteria->order      = $form->orderField . ' ' . $form->orderDirection;
        }
	}
	
	public static function listForCustomRowCount($values)
	{
		$list = array();
		
		if ($values && is_array($values))
		{
			foreach ($values as $value)
			{
				$list = array_merge($list, array($value  => $value));
			}
		}
		
		return $list;
	}

}
