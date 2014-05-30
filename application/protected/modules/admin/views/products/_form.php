<?php
/* @var $this ProductsController */
/* @var $model Products */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'products-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?php echo $form->textField($model,'category_id'); ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'image'); ?>
<!--		--><?php //echo $form->textField($model,'image',array('size'=>60,'maxlength'=>100)); ?>
<!--		--><?php //echo $form->error($model,'image'); ?>
<!--	</div>-->
    <? $this->widget('ext.EAjaxUpload.EAjaxUpload',
         array(
               'id'=>'EAjaxUpload',
               'config'=>array(
                               'action'=>$this->createUrl('products/ImageUpload'),
                               'template'=>'<div class="qq-uploader"><div class="qq-upload-drop-area"><span>Drop files here to upload</span></div><div class="qq-upload-button">Upload a file</div><ul class="qq-upload-list"></ul></div>',
                               'debug'=>false,
                               'allowedExtensions'=>array('jpg'),
                               'sizeLimit'=>10*1024*1024,// maximum file size in bytes
                               'minSizeLimit'=>0,// minimum file size in bytes
                               'onComplete'=>"js:function(id, fileName, responseJSON){
                                        $('.qq-upload-list li').each(function(index,element){
                                            if($(this).find('.qq-upload-file').text() == fileName){
                                                 $(this).html('<div class=\"image-container\" origin-name=\"'+fileName+'\" sys-name=\"'+responseJSON['filename']+'\"><span class=\"helper\"></span><img src=\"'+responseJSON['thumb']+'\" /><div class=\"remove-img\">X</div></div>');
                                                 var cur_images = $('#Products_images').val();
                                                 $('#Products_images').val(cur_images+'|'+responseJSON['filename']);
                                            }
                                        })
                                        console.log(responseJSON);
                                    }",
                                'multiple' => true,

                               //'messages'=>array(
                               //                  'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                               //                  'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                               //                  'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                               //                  'emptyError'=>"{file} is empty, please select files again without it.",
                               //                  'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                               //                 ),
                               //'showMessage'=>"js:function(message){ alert(message); }"
                              )
              )); ?>

	<div class="row">
		<?php echo $form->hiddenField($model,'images',array()); ?>
		<?php echo $form->error($model,'images'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url_name'); ?>
		<?php echo $form->textField($model,'url_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'url_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'author'); ?>
		<?php echo $form->textField($model,'author'); ?>
		<?php echo $form->error($model,'author'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model,'state'); ?>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'visible'); ?>
		<?php echo $form->textField($model,'visible'); ?>
		<?php echo $form->error($model,'visible'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->