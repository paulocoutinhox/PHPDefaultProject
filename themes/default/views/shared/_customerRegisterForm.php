<!-- register form -->
<?php echo CHtml::beginForm($this->createUrl(''), 'post', array('id' => 'form', 'role' => 'form')); ?>

<?php echo CHtml::errorSummary($form); ?>

	<div class="form-group">
		<?php echo CHtml::activeLabel($form, 'email'); ?>
		<div class="controls">
			<?php echo CHtml::activeTextField($form, 'email', array('class' => 'form-control', 'autocomplete' => 'off')); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo CHtml::activeLabel($form, 'username'); ?>
		<div class="controls">
			<?php echo CHtml::activeTextField($form, 'username', array('class' => 'form-control', 'autocomplete' => 'off')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo CHtml::activeLabel($form, 'name'); ?>
		<div class="controls">
			<?php echo CHtml::activeTextField($form, 'name', array('class' => 'form-control', 'autocomplete' => 'off')); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo CHtml::activeLabel($form, 'password'); ?>
		<div class="controls">
			<?php echo CHtml::activePasswordField($form, 'password', array('class' => 'form-control', 'autocomplete' => 'off')); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo CHtml::activeLabel($form, 'repeat_password'); ?>
		<div class="controls">
			<?php echo CHtml::activePasswordField($form, 'repeat_password', array('class' => 'form-control', 'autocomplete' => 'off')); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo CHtml::activeLabel($form, 'gender'); ?>
		<div class="controls">
			<?php echo CHtml::activeDropDownList($form, 'gender', array(Constants::MALE_ID => Constants::MALE_TEXT, Constants::FEMALE_ID => Constants::FEMALE_TEXT), array(Constants::EMPTY_ID => 'Selecione')); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo CHtml::activeLabel($form, 'birth_date'); ?>
		<div class="controls">
			<?php echo CHtml::activeTextField($form, 'birth_date', array('class' => 'form-control', 'autocomplete' => 'off')); ?>
		</div>
	</div>
	
	<?php $this->renderPartial('/shared/_captchaControl', array('form' => $form)); ?>

	<div class="form-group">
		<div class="controls">
			<?php echo CHtml::submitButton('Continuar', array('class' => 'btn btn-default')); ?>
		</div>
	</div>

<?php echo CHtml::endForm(); ?>

<script type="text/javascript">
	$("#Customer_birth_date").mask('99/99/9999');
</script>
<!-- end: register form -->
