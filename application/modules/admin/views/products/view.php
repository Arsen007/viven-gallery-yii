<?php
/* @var $this ProductsController */
/* @var $model Products */
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerCssFile($baseUrl.'/css/products.css');

$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Products', 'url'=>array('index')),
	array('label'=>'Create Product', 'url'=>array('create')),
	array('label'=>'Edit product', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete product', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Products', 'url'=>array('admin')),
);
?>

<h1>View Products #<?php echo $model->id; ?></h1>

<?php
$this->widget('zii.widgets.CMenu', array(
    'items' => $this->menu,
    'htmlOptions' => array('class' => 'product-actions-menu nav inline')
    )
);

$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'category_id',
		'price',
		'description',
		'image',
		'images',
		'url_name',
		'state',
		'visible',
	),
)); ?>
