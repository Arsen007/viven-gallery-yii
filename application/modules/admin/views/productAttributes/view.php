<?php
/* @var $this ProductAttributesController */
/* @var $model ProductAttributes */

$this->breadcrumbs=array(
	'Product Attributes'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ProductAttributes', 'url'=>array('index')),
	array('label'=>'Create ProductAttributes', 'url'=>array('create')),
	array('label'=>'Update ProductAttributes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProductAttributes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductAttributes', 'url'=>array('admin')),
);
?>

<h1>View ProductAttributes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'label',
	),
)); ?>
