<!-- contact form -->
<?php echo CHtml::beginForm($this->createUrl(''), 'post', array('id' => 'form', 'role' => 'form')); ?>

<?php echo CHtml::errorSummary($form); ?>

	<div class="form-group">
		<?php echo CHtml::activeLabel($form, 'fromName'); ?>
		<div class="controls">
			<?php echo CHtml::activeTextField($form, 'fromName', array('class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo CHtml::activeLabel($form, 'fromEmail'); ?>
		<div class="controls">
			<?php echo CHtml::activeTextField($form, 'fromEmail', array('class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo CHtml::activeLabel($form, 'message'); ?>
		<div class="controls">
			<?php echo CHtml::activeTextArea($form, 'message', array('class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="controls">
			<a href="<?php echo($this->createUrl('/home')); ?>" title="Voltar">Voltar</a>
		</div>
	</div>
	<div class="form-group">
		<div class="controls">
			<?php echo CHtml::submitButton('Continuar', array('class' => 'btn btn-default')); ?>
		</div>
	</div>

<?php echo CHtml::endForm(); ?>
<!-- end: contact form -->