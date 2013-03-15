<?php

class Table extends CActiveRecord
{
	protected $dateFields     = array();
	protected $saveTimeStamp  = false;
	protected $currencyFields = array();
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    public function behaviors() {
    	if ($this->saveTimeStamp)
		{
			return array(
				'CTimestampBehavior' => array(
					'class'             => 'zii.behaviors.CTimestampBehavior',
					'createAttribute'   => 'created_at',
					'updateAttribute'   => 'updated_at',
					'setUpdateOnCreate' => 'true',
				)
			);
		}
		else
		{
			return array();
		}
    }
    
    protected function beforeSave()
	{
        foreach($this->metadata->tableSchema->columns as $columnName => $column)
		{
            if ($column->dbType == 'date')
			{
                $this->$columnName = date('Y-m-d', CDateTimeParser::parse($this->$columnName, Yii::app()->locale->dateFormat));
            }
			elseif ($column->dbType == 'datetime')
			{
                //TODO: Ver uma forma de fazer um parser para data/hora
				//$this->$columnName = date('Y-m-d H:i:s', CDateTimeParser::parse($this->$columnName, Yii::app()->locale->dateFormat));
            }
			elseif (substr($column->dbType, 0, 7) == 'decimal' || substr($column->dbType, 0, 6) == 'double')
			{
                $this->$columnName = str_replace('.', '', $this->$columnName);
                $this->$columnName = str_replace(',', '.', $this->$columnName);
                $this->$columnName = (float)$this->$columnName;
            }
        }
        
        return parent::beforeSave();
    }

    protected function afterFind()
	{
		$this->formatAllFields();
        return parent::afterFind();
    }

	public function canModifyOrDelete()
	{
		return array('success' => true, 'message' => null);
	}

	public function formatAllFields()
	{
		foreach($this->metadata->tableSchema->columns as $columnName => $column)
		{
            if (!strlen($this->$columnName)) continue;

			if ($column->dbType == 'date' && in_array($column->name, $this->dateFields))
			{
                $this->$columnName = Yii::app()->dateFormatter->formatDateTime(CDateTimeParser::parse($this->$columnName, 'yyyy-MM-dd'),'medium',null);
            }
			elseif ($column->dbType == 'datetime' && in_array($column->name, $this->dateFields))
			{
                $this->$columnName = Yii::app()->dateFormatter->formatDateTime(CDateTimeParser::parse($this->$columnName, 'yyyy-MM-dd hh:mm:ss'));
            }
			elseif ( (substr($column->dbType, 0, 7) == 'decimal' || substr($column->dbType, 0, 6) == 'double') && in_array($column->name, $this->currencyFields))
			{
                $this->$columnName = Yii::app()->numberFormatter->format(Yii::app()->params['currencyFormat'], $this->$columnName);
            }
        }
	}

	public function getUpdatableFields()
	{
		return null;
	}
	
}