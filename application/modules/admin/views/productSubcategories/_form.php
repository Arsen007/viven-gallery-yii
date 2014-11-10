<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'product-subcategories-form',
	'enableAjaxValidation'=>false,
)); ?>


    <?php echo $form->labelEx($model,'category_id'); ?>
    <?php echo $form->dropDownList($model,'category_id', CHtml::listData($categories->findAll(array('order' => 'name')),'id','label'),array('class'=>'span5'));?>
    <?php echo $form->error($model,'category_id'); ?>

<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'label',array('class'=>'span5','maxlength'=>255)); ?>

<!--	--><?php //echo $form->textAreaRow($model,'description',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
<!---->
<!--	--><?php //echo $form->textAreaRow($model,'image',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
<!---->
<!--	--><?php //echo $form->textAreaRow($model,'keywords',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
