<?php
/* @var $this ProductAttributesController */
/* @var $model ProductAttributes */

$this->breadcrumbs=array(
	'Product Attributes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ProductAttributes', 'url'=>array('index')),
	array('label'=>'Create ProductAttributes', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#product-attributes-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Product Attributes</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?><br>
<?php echo CHtml::link('Add new attribute',$this->createAbsoluteUrl('ProductAttributes/create'),array('class'=>'add-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'product-attributes-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'label',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
