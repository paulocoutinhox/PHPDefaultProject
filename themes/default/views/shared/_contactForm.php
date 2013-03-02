<!-- contact form -->
<?php echo CHtml::beginForm($this->createUrl(''), 'post', array('id' => 'form', 'class' => 'form-horizontal')); ?>

<?php echo CHtml::errorSummary($form); ?>

	<div class="control-group">
		<?php echo CHtml::activeLabel($form, 'fromName', array('class' => 'control-label')); ?>
		<div class="controls">
			<?php echo CHtml::activeTextField($form, 'fromName', array('style' => 'width: 220px;', 'autocomplete' => 'off')); ?>
		</div>
	</div>
	<div class="control-group">
		<?php echo CHtml::activeLabel($form, 'fromEmail', array('class' => 'control-label')); ?>
		<div class="controls">
			<?php echo CHtml::activeTextField($form, 'fromEmail', array('style' => 'width: 220px;', 'autocomplete' => 'off')); ?>
		</div>
	</div>
	<div class="control-group">
		<?php echo CHtml::activeLabel($form, 'message', array('class' => 'control-label')); ?>
		<div class="controls">
			<?php echo CHtml::activeTextArea($form, 'message', array('style' => 'width: 220px; height: 150px;')); ?>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<a href="<?php echo($this->createUrl('/home')); ?>" title="Voltar">Voltar</a>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<?php echo CHtml::submitButton('Continuar', array('class' => 'btn')); ?>
		</div>
	</div>

<?php echo CHtml::endForm(); ?>
<!-- end: contact form -->