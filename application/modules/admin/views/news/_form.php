<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'news-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'title',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'content',array('rows'=>6, 'cols'=>50, 'class'=>'span8','class'=>'content-editor')); ?>

<div class="news-image-uploader">
<?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
     array(
           'id'=>'EAjaxUpload',
           'config'=>array(
                           'action'=>$this->createUrl('news/ImageUpload'),
                           'template'=>'<div class="qq-uploader"><div class="qq-upload-button">Set image</div><ul class="qq-upload-list"></ul></div>',
                           'debug'=>false,
                           'allowedExtensions'=>array('jpg'),
                           'sizeLimit'=>10*1024*1024,// maximum file size in bytes
                           'minSizeLimit'=>0,// minimum file size in bytes
                           'onComplete'=>"js:function(id, fileName, responseJSON){
                                    $('.qq-upload-list li').each(function(index,element){
                                        if($(this).find('.qq-upload-file').text() == fileName){
                                             $(this).html('<div class=\"image-container\"><span class=\"helper\"></span><img src=\"'+responseJSON['thumb']+'\" /><button type=\"button\" class=\"btn btn-danger remove-news-img\">Remove image</button></div>');
                                             $('#News_image').val(responseJSON['filename']);
                                             $('.qq-upload-button').hide();
                                        }
                                    })
                                }",
                            'multiple' => false,

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
</div>
<div class="row">
<?php echo $form->hiddenField($model,'image',array()); ?>
</div>
<?php if(isset($model->time_created)){ ?>
	<?php echo $form->textFieldRow($model,'time_created',array('class'=>'span5','readonly'=>'true'));
    }else{
    echo $form->textFieldRow($model,'time_created',array('class'=>'span5','value'=>date("Y-m-d H:i:s"),'readonly'=>'true'));
}   ?>

	<?php echo $form->textFieldRow($model,'url_name',array('class'=>'span5','maxlength'=>255)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

<script>
    $(document).ready(function () {
        $('.content-editor').ckeditor({
            filebrowserBrowseUrl : '<?php echo Yii::app()->getBaseUrl(true) ?>/kcfinder-master/',
            filebrowserImageBrowseUrl : '<?php echo Yii::app()->getBaseUrl(true) ?>/kcfinder-master/?type=Images',
            filebrowserFlashBrowseUrl : '<?php echo Yii::app()->getBaseUrl(true) ?>/kcfinder-master/?type=Flash',
            filebrowserUploadUrl : '<?php echo Yii::app()->getBaseUrl(true) ?>/kcfinder-master/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl : '<?php echo Yii::app()->getBaseUrl(true) ?>/kcfinder-master/core/connector/php/connector.php?command=QuickUpload&type=Images',
            filebrowserFlashUploadUrl : '<?php echo Yii::app()->getBaseUrl(true) ?>/kcfinder-master/core/connector/php/connector.php?command=QuickUpload&type=Flash',
            height:'500px'
        });


        setTimeout(function(){
            if($('#News_image').val()  != ''){
                $('.qq-upload-list').append('<li class=" qq-upload-success"><div class="image-container" <span class="helper"></span><img src="<?php echo Yii::app()->baseUrl; ?>/images/uploads/news/thumbs/'+$('#News_image').val()+'"><button type="button" class="btn btn-danger remove-news-img">Remove image</button></div></li>')
                $('.qq-upload-button').hide();
            }
        },300)

        $('.remove-news-img').live('click',function(){
            $('.qq-upload-list').html('');
            $('.qq-upload-button').show();
            $('#News_image').val('');
        })

        $('#News_title').keyup(function(){
            $('#News_url_name').val($(this).val().replace(/\s+/g, '-').toLowerCase());
        })
    });
</script>