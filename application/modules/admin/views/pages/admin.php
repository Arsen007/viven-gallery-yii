<?php
/* @var $this PagesController */
/* @var $model Pages */

$this->breadcrumbs=array(
	'Pages'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Pages', 'url'=>array('index')),
	array('label'=>'Create Pages', 'url'=>array('create')),
);
$this->widget('zii.widgets.CMenu', array(
    'items' => $this->menu,
    'htmlOptions' => array('class' => 'product-actions-menu nav inline')
    )
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pages-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Pages</h1>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'pages-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'url_name',
		'title',
		'content',
		'keywords',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
