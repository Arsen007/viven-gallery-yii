<div class="item">
<a href="<?php echo Yii::app()->baseUrl.'/product/'.$data->url_name.'.html' ?>" title="<?php echo CHtml::encode($data->name);  ?>">
    <div class="product-image-container"><?php echo CHtml::image(Yii::app()->baseUrl . "/images/uploads/products/thumbs/" . $data->image) ?></div>
    <span class="product-name"><?php echo (strlen(CHtml::encode($data->name)) > 18?substr(CHtml::encode($data->name),0,18).'..':CHtml::encode($data->name) ); ?></span>
   	<br />
    <?php
    $cn=new CNumberFormatter('en');
    ?>
	<span class="product-price"><?php echo '$'.$cn->formatCurrency($data->price, ''); ?></span>
	<br />
</a>
	<?php /*

	<b><?php echo CHtml::encode($data->getAttributeLabel('url_name')); ?>:</b>
	<?php echo CHtml::encode($data->url_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
	<?php echo CHtml::encode($data->state); ?>
	<br />
	*/ ?>

</div>