<div class="item">
<a href="<?php echo Yii::app()->baseUrl.'/product/'.$data->url_name.'.html' ?>">
    <div class="product-image-container"><?php echo CHtml::image(Yii::app()->baseUrl . "/images/uploads/products/thumbs/" . $data->image) ?></div>
    <span class="product-name"><?php echo CHtml::encode($data->name); ?></span>
   	<br />
	<span class="product-price"><?php echo '$'.CHtml::encode($data->price); ?></span>
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