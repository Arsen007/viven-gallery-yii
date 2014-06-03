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
        <?php echo $form->dropDownList($model,'category_id', CHtml::listData($categories->findAll(array('order' => 'name')),'id','label'));?>
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

		<?php echo $form->hiddenField($model,'image'); ?>

    <div class="row">
    <? $this->widget('ext.EAjaxUpload.EAjaxUpload',
         array(
               'id'=>'EAjaxUpload',
               'config'=>array(
                               'action'=>$this->createUrl('products/ImageUpload'),
                               'template'=>'<div class="qq-uploader"><div class="qq-upload-drop-area"><span>Drop files here to upload</span></div><div class="qq-upload-button">Upload images</div><ul class="qq-upload-list"></ul></div>',
                               'debug'=>false,
                               'allowedExtensions'=>array('jpg'),
                               'sizeLimit'=>10*1024*1024,// maximum file size in bytes
                               'minSizeLimit'=>0,// minimum file size in bytes
                               'onComplete'=>"js:function(id, fileName, responseJSON){
                                        $('.qq-upload-list li').each(function(index,element){
                                            if($(this).find('.qq-upload-file').text() == fileName){
                                                 $(this).html('<div class=\"image-container\" origin-name=\"'+fileName+'\" sys-name=\"'+responseJSON['filename']+'\"><span class=\"helper\"></span><img src=\"'+responseJSON['thumb']+'\" /><div class=\"remove-img\">X</div><div class=\"set-main-btn\"></div></div>');
                                                 var cur_images = $('#Products_images').val();
                                                 $('#Products_images').val(cur_images+'|'+responseJSON['filename']);
                                            }
                                        })
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
    </div>
	<div class="row">
		<?php echo $form->hiddenField($model,'images',array()); ?>
		<?php echo $form->error($model,'images'); ?>
	</div>
    <div class="attributes">
        <div class="row">
            <button class="btn btn-primary btn-lg" id="add-attr" data-toggle="modal" data-target="#myModal">Add attribute from list</button>
            <div class="attribute-inputs-list">
                <?php
                $custom_attributes = array();
                if ($model->custom_attributes != null) {
                    $custom_attributes = unserialize($model->custom_attributes);
                    $existingAttrList = array();
                    foreach ($custom_attributes as $key => $value) {
                        $existingAttrList[] = $key;
                        echo '<label><span class = "attr-label">' . $attributes->findByAttributes(array('name' => $key))->label . '</span><br><input type="text" name="Products-custom-attributes[' . $key . ']" value="' . $value . '"><button class="btn btn-danger remove-attr">Remove</button></label>';
                    }
                }
                ?>
            </div>
        </div>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'url_name'); ?>
		<?php echo $form->textField($model,'url_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'url_name'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model,'state'); ?>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row">
        <?php echo $form->dropDownList($model, 'visible', array(1=>'Visible', 0=>'Hidden'));?>
	</div>

	<div class="row buttons">
        <input type="submit" value="<?php echo $model->isNewRecord ? 'Create' : 'Save'?>" class="btn btn-success">
	</div>

<?php $this->endWidget(); ?>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    <ul class="list-group">
                        <?php
                        foreach ($attributes->findAll() as $value) {
                            if (!empty($existingAttrList)) {
                                if (in_array($value->name, $existingAttrList)) {

                                } else {
                                    echo '<li class="list-group-item"><label><span style="width:100px">' . $value->label . '</span><input class="btn btn-primary btn-lg add-this-attribute" type="button" name=' . $value->name . ' value="Add" ><label></li>';
                                }
                            } else {
                                echo '<li class="list-group-item"><label><span style="width:100px">' . $value->label . '</span><input class="btn btn-primary btn-lg add-this-attribute" type="button" name=' . $value->name . ' value="Add" ><label></li>';
                            }

                        }
                        ?>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.add-this-attribute').live('click', function () {
            $('<label><span class="attr-label">' + $(this).parent().find('span').text() + '</span><br><input type="text" name="Products-custom-attributes[' + $(this).attr('name') + ']" /><button class="btn btn-danger remove-attr">Remove</button></label>').appendTo('.attribute-inputs-list').hide().show(300);
            $(this).parent().parent().hide(300, function () {
                $(this).remove()
            });
        })

        $('.remove-attr').live('click', function () {
            var inputNameStr = $(this).siblings('input').attr('name');
            var attributeName = inputNameStr.substring(inputNameStr.lastIndexOf("[") + 1, inputNameStr.lastIndexOf("]"));
            var attributeLabel = $(this).parent().find('.attr-label').text();
            $('.list-group').append('<li class="list-group-item"><label><span style="width:100px">' + attributeLabel + '</span><input class="btn btn-primary btn-lg add-this-attribute" type="button" name="' + attributeName + '" value="Add"></label></li>');
            $(this).parent().hide(300, function () {
                $(this).remove();
            })
            return false;
        })
     </script>
</div><!-- form -->