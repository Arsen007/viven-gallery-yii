<?php
/* @var $this ProductsController */
/* @var $model Products */
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/products.js');
$cs->registerCssFile($baseUrl.'/css/products.css');

$this->breadcrumbs=array(
	'Products'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Products', 'url'=>array('index')),
	array('label'=>'Manage Products', 'url'=>array('admin')),
);
?>

<h1>Create Products</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>