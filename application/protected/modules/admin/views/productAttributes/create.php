<?php
/* @var $this ProductAttributesController */
/* @var $model ProductAttributes */

$this->breadcrumbs=array(
	'Product Attributes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductAttributes', 'url'=>array('index')),
	array('label'=>'Manage ProductAttributes', 'url'=>array('admin')),
);
?>

<h1>Create ProductAttributes</h1>

<?php
$outputJs = Yii::app()->request->isAjaxRequest;
$this->renderPartial('_form', array('model'=>$model), false, $outputJs);
?>