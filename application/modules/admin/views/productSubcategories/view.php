<?php
$this->breadcrumbs=array(
	'Product Subcategories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ProductSubcategories','url'=>array('index')),
	array('label'=>'Create ProductSubcategories','url'=>array('create')),
	array('label'=>'Update ProductSubcategories','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete ProductSubcategories','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductSubcategories','url'=>array('admin')),
);
?>

<h1>View ProductSubcategories #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'category_id',
		'name',
		'label',
		'description',
		'image',
		'keywords',
	),
)); ?>
