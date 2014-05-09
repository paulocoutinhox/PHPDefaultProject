<!-- forgot password form -->
<?php echo CHtml::beginForm($this->createUrl(''), 'post', array('id' => 'form', 'role' => 'form')); ?>

<?php echo CHtml::errorSummary($form); ?>

	<div class="form-group">
		<?php echo CHtml::activeLabel($form, 'email'); ?>
		<div class="controls">
			<?php echo CHtml::activeTextField($form, 'email', array('class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="controls">
			<a href="<?php echo($this->createUrl('/login')); ?>" title="Voltar">Voltar</a>
		</div>
	</div>
	<div class="form-group">
		<div class="controls">
			<?php echo CHtml::submitButton('Continuar', array('class' => 'btn btn-default')); ?>
		</div>
	</div>

<?php echo CHtml::endForm(); ?>
<!-- end: forgot password form -->