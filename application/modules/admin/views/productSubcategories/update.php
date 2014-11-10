<?php
$this->breadcrumbs=array(
	'Product Subcategories'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductSubcategories','url'=>array('index')),
	array('label'=>'Create ProductSubcategories','url'=>array('create')),
	array('label'=>'View ProductSubcategories','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage ProductSubcategories','url'=>array('admin')),
);
?>

<h1>Update ProductSubcategories <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array(
    'model'=>$model,
    'categories'=>$categories
)); ?>