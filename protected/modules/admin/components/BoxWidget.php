<?php

class BoxWidget extends CWidget
{
    public $title;
    public $width;
    public $image;

    public function init()
    {
        echo('<table class="boxwidget" width="' . $this->width . '" border="0" cellpadding="0" cellspacing="0" style="width: ' . $this->width . '">
                  <tr>
                      <td class="p1"><table><tr><td class="p1_1">' . ($this->image != '' ? '<img src="' . (Yii::app()->request->baseUrl . '/public/admin/images/'.$this->image) . '" border="0" alt="" />' : '<img src="' . (Yii::app()->request->baseUrl . '/public/admin/images/ico_modulo.png') . '" border="0" alt="" />') . '</td><td class="p1_2"><span>' . $this->title . '</span></td></tr></table></td>
                  </tr>
                  <tr>
                      <td class="p2">');
    }

    public function run()
    {
        echo('    </td>
 			  </tr>
    		  </table>');
    }
}