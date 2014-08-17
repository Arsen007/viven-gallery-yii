<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'category_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'price',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textAreaRow($model,'custom_attributes',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'description',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'image',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textAreaRow($model,'images',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'url_name',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'state',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'visible',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'keywords',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
