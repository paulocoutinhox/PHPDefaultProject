<!-- login form -->
<?php echo CHtml::beginForm($this->createUrl('/login'), 'post', array('id' => 'form', 'role' => 'form')); ?>

<?php echo CHtml::errorSummary($form); ?>

	<div class="form-group">
		<?php echo CHtml::activeLabel($form, 'username'); ?>
		<div class="controls">
			<?php echo CHtml::activeTextField($form, 'username', array('class' => 'form-control', 'autocomplete' => 'off')); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo CHtml::activeLabel($form, 'password'); ?>
		<div class="controls">
			<?php echo CHtml::activePasswordField($form, 'password', array('class' => 'form-control', 'autocomplete' => 'off')); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="controls">
			<p>
				<a href="<?php echo($this->createUrl('/forgotPassword')); ?>" title="Esqueci a senha">Esqueci a senha</a>
			</p>
			<p>
				<a href="<?php echo($this->createUrl('/home')); ?>" title="Voltar">Voltar</a>
			</p>
		</div>
	</div>
	<div class="form-group">
		<div class="controls">
			<?php echo CHtml::submitButton('Continuar', array('class' => 'btn btn-default')); ?>
		</div>
	</div>

<?php echo CHtml::endForm(); ?>
<!-- end: login form -->