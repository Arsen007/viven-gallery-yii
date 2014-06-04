<?php
$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Products','url'=>array('index')),
	array('label'=>'Create Products','url'=>array('create')),
	array('label'=>'Update Products','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Products','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Products','url'=>array('admin')),
);
?>

<h1>View Products #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'category_id',
		'price',
		'custom_attributes',
		'description',
		'image',
		'images',
		'url_name',
		'state',
		'visible',
		'keywords',
	),
)); ?>
