<!-- contact form -->
<div class="form">

	<?php echo $model->content; ?>

	<?php echo CHtml::beginForm($this->createUrl(''), 'post', array('id' => 'form')); ?>

		<?php echo CHtml::errorSummary($form); ?>

		<div class="row">
			<?php echo CHtml::activeLabel($form, 'fromName'); ?>
			<?php echo CHtml::activeTextField($form, 'fromName', array('style' => 'width: 300px;', 'class' => 'text')); ?>
		</div>
		
		<div class="row">
			<?php echo CHtml::activeLabel($form, 'fromEmail'); ?>
			<?php echo CHtml::activeTextField($form, 'fromEmail', array('style' => 'width: 300px;', 'class' => 'text')); ?>
		</div>
		
		<div class="row">
			<?php echo CHtml::activeLabel($form, 'message'); ?>
			<?php echo CHtml::activeTextArea($form, 'message', array('style' => 'width: 300px; height: 150px;')); ?>
		</div>
	
		<div class="row">
			<?php echo CHtml::submitButton('Continuar'); ?>
		</div>

	<?php echo CHtml::endForm(); ?>

</div>
<!-- end: contact form -->