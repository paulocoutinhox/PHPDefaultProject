<!-- login form -->
<div class="form">

	<?php echo CHtml::beginForm($this->createUrl(''), 'post', array('id' => 'form')); ?>

		<?php echo CHtml::errorSummary($form); ?>

		<div class="row">
			<?php echo CHtml::activeLabel($form, 'username'); ?>
			<?php echo CHtml::activeTextField($form, 'username', array('style' => 'width: 300px;', 'class' => 'text', 'autocomplete' => 'off')); ?>
		</div>
		
		<div class="row">
			<?php echo CHtml::activeLabel($form, 'password'); ?>
			<?php echo CHtml::activePasswordField($form, 'password', array('style' => 'width: 300px;', 'class' => 'text', 'autocomplete' => 'off')); ?>
		</div>

		<div class="row">
			<ul>
				<li>
					<a href="<?php echo($this->createUrl('/forgotPassword')); ?>" title="Esqueci a senha">Esqueci a senha</a>
				</li>
				<li>
					<a href="<?php echo($this->createUrl('/register')); ?>" title="Ainda não sou cadastrado">Ainda não sou cadastrado</a>
				</li>
			</ul>
		</div>
	
		<div class="row">
			<?php echo CHtml::submitButton('Continuar'); ?>
		</div>

	<?php echo CHtml::endForm(); ?>

</div>
<!-- end: login form -->