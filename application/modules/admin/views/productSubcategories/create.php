<?php
$this->breadcrumbs=array(
	'Product Subcategories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductSubcategories','url'=>array('index')),
	array('label'=>'Manage ProductSubcategories','url'=>array('admin')),
);
?>

<h1>Create ProductSubcategories</h1>

<?php echo $this->renderPartial('_form', array(
    'model'=>$model,
    'categories'=>$categories
)); ?>