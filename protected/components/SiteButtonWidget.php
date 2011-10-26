<?php

class SiteButtonWidget extends CWidget
{
    public $text;
    public $link;
    public $options;
    public $id;
    public $image;

    public function init()
    {
        $html = '<a class="button" href="' . $this->link . '">';
		
		if (empty($this->image) == false)
		{
			$html .= '<img src="' . Yii::app()->theme->baseUrl . '/images/' . $this->image . '" alt="" border="0" />';
		}
		
		$html .= $this->text;
		
		$html .= '</a>';
		
		echo($html);
    }

    public function run()
    {
        
    }
}