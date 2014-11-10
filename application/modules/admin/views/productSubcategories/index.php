<?php
$this->breadcrumbs=array(
	'Product Subcategories',
);

$this->menu=array(
	array('label'=>'Create ProductSubcategories','url'=>array('create')),
	array('label'=>'Manage ProductSubcategories','url'=>array('admin')),
);
?>

<h1>Product Subcategories</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
