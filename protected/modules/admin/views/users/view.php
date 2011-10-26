<?php $this->beginWidget('application.modules.admin.components.BoxWidget', array('title' => $moduleTitle . ' / visualizar registro', 'width' => '100%', 'image' => 'ico_visualizar.png')); ?>
    
    <div class="buttons">
    
        <?php $this->widget('ButtonWidget', array('title' => 'Voltar', 'link' => $this->createUrl('/admin/' . $this->getId()))); ?>
        <?php $this->widget('ButtonWidget', array('title' => 'Novo registro', 'link' => $this->createUrl('/admin/' . $this->getId() . '/add'))); ?>
        <?php $this->widget('ButtonWidget', array('title' => 'Alterar', 'link' => $this->createUrl('/admin/' . $this->getId() . '/update/id/' . $model->id))); ?>
        <?php $this->widget('ButtonWidget', array('title' => 'Excluir', 'link' => 'javascript: deleteRow(\'' . $this->createUrl($this->getId() . '/delete/id/' . $model->id) . '\');')); ?>
            
    </div>
    
    <div class="clear separator"></div>
    
    <div class="form">
        
        <fieldset>
            
            <legend>Dados</legend>

				<span class="row">
                    <?php echo CHtml::activeLabel($model, 'id', array('class' => 'preField')); ?>
                    <span class="disabledField"><?php echo $model->id; ?></span>
                </span>

                <span class="row">
                    <?php echo CHtml::activeLabel($model, 'name', array('class' => 'preField')); ?>
                    <span class="disabledField"><?php echo $model->name; ?></span>
                </span>

                <span class="row">
                    <?php echo CHtml::activeLabel($model, 'email', array('class' => 'preField')); ?>
                    <span class="disabledField"><?php echo $model->email; ?></span>
                </span>

                <span class="row">
                    <?php echo CHtml::activeLabel($model, 'username', array('class' => 'preField')); ?>
                    <span class="disabledField"><?php echo $model->username; ?></span>
                </span>

                <span class="row">
                    <?php echo CHtml::activeLabel($model, 'root', array('class' => 'preField')); ?>
                    <span class="disabledField">
						<?php
						if ($model->root == Constants::YES_ID)
						{
							echo(Constants::YES_TEXT);
						}
						else if ($model->root == Constants::NO_ID)
						{
							echo(Constants::NO_TEXT);
						}
						?>
					</span>
                </span>

                <span class="row">
                    <?php echo CHtml::activeLabel($model, 'active', array('class' => 'preField')); ?>
                    <span class="disabledField">
						<?php
						if ($model->active == Constants::YES_ID)
						{
							echo(Constants::YES_TEXT);
						}
						else if ($model->active == Constants::NO_ID)
						{
							echo(Constants::NO_TEXT);
						}
						?>
					</span>
                </span>

        </fieldset>

		<fieldset>

            <legend>Grupos</legend>

            <table>

            <?php $this->renderPartial('_groups', array('model' => $model, 'groups' => $groups)); ?>

            </table>

        </fieldset>
                
    </div>
    
<?php $this->endWidget(); ?>