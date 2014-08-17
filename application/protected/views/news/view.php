<?php
$this->breadcrumbs=array(
	'News'=>array('index'),
	$model->title,
);
?>
<?php
   echo CHtml::image(Yii::app()->getBaseUrl(true).'/images/uploads/news/thumbs/'.$model->image,'',array('width'=>'160','height'=>'160','style'=>'float:right'));
   ?>
<div style="clear: both"></div>
<h1><?php echo $model->title; ?></h1>
<div class="news-content" style="background-color: white;overflow: hidden;padding: 10px;height: 500px">
    <?php echo $model->content ?>
</div>
<?php //$this->widget('bootstrap.widgets.TbDetailView',array(
//	'data'=>$model,
//	'attributes'=>array(
//		'id',
//		'title',
//		'content',
//		'time_created',
//		'url_name',
//	),
//)); ?>
