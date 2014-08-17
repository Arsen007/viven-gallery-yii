<div class="view" style="overflow: hidden;margin-top: 10px">


	<?php
    echo CHtml::image(Yii::app()->getBaseUrl(true).'/images/uploads/news/thumbs/'.$data->image,'',array('width'=>'160','height'=>'160','style'=>'float:left'));
    ?>
    <h2 style="line-height: 10px;text-decoration: underline;cursor: pointer;"><a style="margin-left: 10px" href="<?php echo Yii::app()->getBaseUrl(true).'/news/'.$data->url_name.'.html' ?>"><?php echo CHtml::encode($data->title); ?></a></h2>
    <?php
    $contentText = strip_tags($data->content);
    echo '<div style="float:left;width:800px;height:70px; font-size: 13px;line-height: 14px;margin-left:14px;color:rgb(218, 218, 218);">'.mb_substr($contentText,0,500).'..</div>'; ?>
	<p style="float: right;color: rgb(143, 143, 143);"><?php echo CHtml::encode($data->time_created); ?></p>


</div>