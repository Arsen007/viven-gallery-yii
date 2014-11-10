<?php
$this->breadcrumbs=array(
	'Product Subcategories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ProductSubcategories','url'=>array('index')),
	array('label'=>'Create ProductSubcategories','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('product-subcategories-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Product Subcategories</h1>

<?php echo CHtml::link('Add new','create',array('class'=>'btn default-btn'))?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'product-subcategories-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'category_id',
		'name',
		'label',
		'description',
		'image',
		/*
		'keywords',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
