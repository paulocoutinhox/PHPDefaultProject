<!-- login form -->
<?php echo CHtml::beginForm($this->createUrl('/login'), 'post', array('id' => 'form')); ?>

	<?php echo CHtml::errorSummary($form); ?>

	<form class="form-horizontal">
		<div class="control-group">
			<?php echo CHtml::activeLabel($form, 'username', array('class' => 'control-label')); ?>
			<div class="controls">
				<?php echo CHtml::activeTextField($form, 'username', array('style' => 'width: 260px;', 'autocomplete' => 'off')); ?>
			</div>
		</div>
		<div class="control-group">
			<?php echo CHtml::activeLabel($form, 'password', array('class' => 'control-label')); ?>
			<div class="controls">
				<?php echo CHtml::activePasswordField($form, 'password', array('style' => 'width: 260px;', 'class' => 'text', 'autocomplete' => 'off')); ?>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<p>
					<a href="<?php echo($this->createUrl('/forgotPassword')); ?>" title="Esqueci a senha">Esqueci a senha</a>
				</p>
				<p>
					<a href="<?php echo($this->createUrl('/default')); ?>" title="Voltar">Voltar</a>
				</p>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<?php echo CHtml::submitButton('Continuar', array('class' => 'btn')); ?>
			</div>
		</div>
	</form>

<?php echo CHtml::endForm(); ?>
<!-- end: login form -->