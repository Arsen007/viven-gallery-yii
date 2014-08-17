<?php
$this->breadcrumbs=array(
	'Category',
    $currentCategory
);

$this->menu=array(
	array('label'=>'Create Products','url'=>array('create')),
	array('label'=>'Manage Products','url'=>array('admin')),
);
?>

<h1><?php echo $this->currentCategorylabel ?></h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
