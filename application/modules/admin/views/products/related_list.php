<?php


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#products-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'products-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'ajaxUrl' => 'http://viven-gallery-yii.dev/admin/products/getProductListView',
	'columns'=>array(
		'id',
		'name',
//		'description',
		array('name'=>'image',
		                'type'=>'html',
            'value' => 'CHtml::image(Yii::app()->baseUrl . "/images/uploads/products/thumbs/" . $data->image,"",array("height"=>90))'
        ),
		/*
		'images',
		'url_name',
		'state',
		'visible',
		*/
        array(
            'class'=>'CButtonColumn',
            'template'=>'{add}',
            'buttons'=>array
            (
                'add' => array
                (
                    'label' => 'Add +',
                    'options' => array('class' => 'btn btn-primary btn-lg'),
                    'click' => "function(){
                                        var currRow = $(this).parent().parent();
                                        id = currRow.find('td:first').text();
                                        name = currRow.find('td:gt(0):first').text();
                                        image = currRow.find('td:gt(1):first img').attr('src');
                                        console.log(image);
                                        $('.related-products-container table').append('<tr><td>'+id+'</td><td>'+name+'</td><td><img width=\"60\" src=\"'+image+'\" ></td><td><button class=\"btn btn-danger related-remove\">Remove</button></td></tr>');
                                        updateRelatedInput();
                                        $(this).parent().parent().remove();
                                            return false;
                                      }
                             ",
                ),
            )
	),
    ))); ?>
