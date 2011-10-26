<?php

class ButtonWidget extends CWidget
{
    public $title;
    public $link;
    public $options;
    public $class;
    public $id;

    public function init()
    {
        echo('<a id="' . $this->id . '" class="button ' . $this->class . '" href="' . $this->link . '" ' . $this->options . '><span>' . $this->title . '</span></a>');
    }

    public function run()
    {
        
    }
}