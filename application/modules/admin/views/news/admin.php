<?php
$this->breadcrumbs=array(
	'News'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Create News','url'=>array('create')),
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
	$.fn.yiiGridView.update('news-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage News</h1>


<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'news-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'time_created',
		'url_name',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
