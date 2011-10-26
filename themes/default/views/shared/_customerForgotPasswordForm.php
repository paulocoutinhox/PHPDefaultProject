<!-- forgot password form -->
<div class="form">

	<?php echo CHtml::beginForm($this->createUrl(''), 'post', array('id' => 'form')); ?>

		<?php echo CHtml::errorSummary($form); ?>

		<div class="row">
			<?php echo CHtml::activeLabel($form, 'email'); ?>
			<?php echo CHtml::activeTextField($form, 'email', array('style' => 'width: 300px;', 'class' => 'text')); ?>
		</div>
	
		<div class="row">
			<?php echo CHtml::submitButton('Continuar'); ?>
		</div>

	<?php echo CHtml::endForm(); ?>

</div>
<!-- end: forgot password form -->