<?php $this->beginWidget('application.modules.admin.components.BoxWidget', array('title' => $moduleTitle . ' / alterar registro', 'width' => '100%', 'image' => 'ico_alterar.png')); ?>
    
    <div class="buttons">
    
        <?php $this->widget('ButtonWidget', array('title' => 'Confirmar', 'link' => 'javascript: $(\'#form\').submit();')); ?>
        <?php $this->widget('ButtonWidget', array('title' => 'Novo registro', 'link' => $this->createUrl('/admin/' . $this->getId() . '/add'))); ?>
        <?php $this->widget('ButtonWidget', array('title' => 'Excluir', 'link' => 'javascript: deleteRow(\'' . $this->createUrl($this->getId() . '/delete/id/' . $form->id) . '\');')); ?>
        <?php $this->widget('ButtonWidget', array('title' => 'Voltar', 'link' => $this->createUrl('/admin/' . $this->getId()))); ?>
    
    </div>
    
    <div class="clear separator"></div>
    
    <div class="form">
        <?php echo CHtml::beginForm($this->createUrl('', array('id' => $form->id)), 'post', array('id' => 'form', 'enctype' => 'multipart/form-data')); ?>
 
        <?php echo CHtml::errorSummary($form); ?>
        
        <fieldset>

            <legend>Dados</legend>

            <span class="row">
                <?php echo CHtml::activeLabel($form, 'name', array('class' => 'preField')); ?>
                <?php echo CHtml::activeTextField($form, 'name'); ?>
            </span>

            <span class="row">
                <?php echo CHtml::activeLabel($form, 'email', array('class' => 'preField')); ?>
                <?php echo CHtml::activeTextField($form, 'email'); ?>
            </span>

			<span class="row">
                <?php echo CHtml::activeLabel($form, 'username', array('class' => 'preField')); ?>
                <?php echo CHtml::activeTextField($form, 'username', array('autocomplete' => 'off')); ?>
            </span>

            <span class="row">
                <?php echo CHtml::activeLabel($form, 'password', array('class' => 'preField')); ?>
                <?php echo CHtml::activePasswordField($form, 'password', array('autocomplete' => 'off')); ?>
				<span id="passwordStrengthPlaceHolder" style="display: inline-block; width: 200px;">Place Holder</span>
            </span>

            <span class="row">
                <?php echo CHtml::activeLabel($form, 'repeat_password', array('class' => 'preField')); ?>
                <?php echo CHtml::activePasswordField($form, 'repeat_password', array('autocomplete' => 'off')); ?>
            </span>

            <span class="row">
                <?php echo CHtml::activeLabel($form, 'root', array('class' => 'preField')); ?>
                <?php echo CHtml::activeDropDownList($form, 'root', array(Constants::YES_ID => Constants::YES_TEXT, Constants::NO_ID => Constants::NO_TEXT), array(Constants::EMPTY_ID => Constants::EMPTY_TEXT)); ?>
            </span>

            <span class="row">
                <?php echo CHtml::activeLabel($form, 'active', array('class' => 'preField')); ?>
                <?php echo CHtml::activeDropDownList($form, 'active', array(Constants::YES_ID => Constants::YES_TEXT, Constants::NO_ID => Constants::NO_TEXT), array(Constants::EMPTY_ID => Constants::EMPTY_TEXT)); ?>
            </span>

        </fieldset>

        <fieldset>

            <legend>Grupos</legend>

            <table>

            <?php $this->renderPartial('_groups', array('model' => $model, 'groups' => $groups)); ?>

            </table>

        </fieldset>
               
    <?php echo CHtml::endForm(); ?>
    
    </div>
    
<?php $this->endWidget(); ?>

<script type="text/javascript">
	$(document).ready(function(){
		$('#AdminFormUser_password').pstrength({
			minChar: 8,
			displayMinChar: false,
			verdicts: ['Fraco', 'Normal', 'Médio', 'Forte', 'Muito forte'],
			placeHolder: $('#passwordStrengthPlaceHolder')
		});
	});
</script>