<?php $this->beginWidget('application.modules.admin.components.BoxWidget', array('title' => 'Bem vindo', 'width' => '100%')); ?>
    
    <div style="padding: 20px 0; text-align: center;">
        <img src="<?php echo(Yii::app()->request->baseUrl . '/public/admin/images/logo.png'); ?>" alt="" border="0" />
    </div>
    
<?php $this->endWidget(); ?>