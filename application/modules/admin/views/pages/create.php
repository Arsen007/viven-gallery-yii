<?php
/* @var $this PagesController */
/* @var $model Pages */
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/ckeditor/ckeditor.js');
$cs->registerScriptFile($baseUrl.'/js/ckeditor/jquery-ck_editor.js');
$cs->registerCssFile($baseUrl.'/css/products.css');

$this->breadcrumbs=array(
	'Pages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pages', 'url'=>array('index')),
	array('label'=>'Manage Pages', 'url'=>array('admin')),
);
?>

<h1>Create Pages</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>