<div class="form-group">
    <?php echo CHtml::activeLabel($form, 'verify_code'); ?>
    <div class="controls">
        <?php echo CHtml::activeTextField($form, 'verify_code', array('class' => 'form-control', 'autocomplete' => 'off')); ?>
        <p class="help-inline">Digite o texto da imagem abaixo</p>
        <p class="captcha-control"><?php $this->widget("CCaptcha", array('buttonLabel'=>'Não consigo ler, trocar o texto', 'buttonOptions' => array('class' => 'captcha-button'))); ?></p>
    </div>
</div>