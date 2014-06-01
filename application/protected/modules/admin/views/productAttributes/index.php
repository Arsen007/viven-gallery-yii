<?php
/* @var $this ProductAttributesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Product Attributes',
);

$this->menu=array(
	array('label'=>'Create ProductAttributes', 'url'=>array('create')),
	array('label'=>'Manage ProductAttributes', 'url'=>array('admin')),
);
?>

<h1>Product Attributes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
