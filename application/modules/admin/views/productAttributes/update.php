<?php
/* @var $this ProductAttributesController */
/* @var $model ProductAttributes */

$this->breadcrumbs=array(
	'Product Attributes'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductAttributes', 'url'=>array('index')),
	array('label'=>'Create ProductAttributes', 'url'=>array('create')),
	array('label'=>'View ProductAttributes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProductAttributes', 'url'=>array('admin')),
);
?>

<h1>Update ProductAttributes <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>