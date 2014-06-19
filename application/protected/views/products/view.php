<?php
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/jsCarousel-2.0.0.js');
$cs->registerScriptFile($baseUrl.'/js/jquery.fancybox.js');
$cs->registerScriptFile($baseUrl.'/js/jquery.mousewheel-3.0.6.pack.js');
$cs->registerCssFile($baseUrl.'/css/jsCarousel-2.0.0.css');
$cs->registerCssFile($baseUrl.'/css/jquery.fancybox.css');

$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->name,
);
?>
<!---->
<!--<h1>View Products #--><?php //echo $model->id; ?><!--</h1>-->
<!---->
<?php //$this->widget('bootstrap.widgets.TbDetailView',array(
//	'data'=>$model,
//	'attributes'=>array(
//		'id',
//		'name',
//		'category_id',
//		'price',
//		'custom_attributes',
//		'description',
//		'image',
//		'images',
//		'url_name',
//		'state',
//		'visible',
//		'keywords',
//	),
//)); ?>
<style>
    .product{
        width: 100%;
    }

    .image-container{
        width: 300px;
        height: 385px;
        /*border: 1px solid #c0c0c0;*/
        /*background: #5f7a00;*/
        float: left;
    }
    .overview{
        width: 478px;
        /*height: 350px;*/
        /*background: #FF6000;*/
        float: left;
        margin-left:5px ;
        padding-left:5px ;
        padding-right:5px ;
    }

    .tabs-container{
        width: 750px;
        height: 350px;
        /*background: #2b2f7a;*/
        margin: 10px;

    }

    .main-image-container{
        height: 300px;
        /*border: 1px solid;*/
    }
    .main-image-container img{
        width: 300px;
    }

    #description{
        font-size: 17px;
        color: red;
        text-underline-position: 20px;
        line-height: 27px;
        padding-left: 10px;
        padding-right: 12px;
    }
    .attributes{
        border-radius: 5px;
        overflow: hidden;
        width: 437px;
    }

    .attributes table{
        font-size: 16px;
        line-height: 20px;
    }
    .attributes table td{
        border-right: 1px solid;
        width: 130px;
        padding-left: 15px;
        height: 27px;
        vertical-align: middle;
    }

    .attributes table tr:nth-child(even) {background: #CCC}
    .attributes table tr:nth-child(odd) {background: #FFF}

    .allign-helper{
        display: inline-block;
        /*height: 100%;*/
        vertical-align: middle;
    }


</style>

<div class="product">
    <div class="image-container">
        <div class="main-image-container">
            <div style="height: 100%;width: 100%">
                <span class="allign-helper"></span>
<!--            <img src="--><?php //echo Yii::app()->baseUrl.''.$model->image ?><!--">-->
                <a class="fancybox"  href="<?php echo Yii::app()->getBaseUrl(true).'/images/uploads/products/origins/'.$model->image?>">
            <?php echo  CHtml::image(Yii::app()->getBaseUrl(true).'/images/uploads/products/thumbs/'.$model->image) ?>
                </a>
            </div>
        </div>
        <div class="thumbs-container">
            <?php
            $images = explode('|',$model->images);
            foreach($images as $image){
                if($image ==''){
                    continue;
                }  ?>
                <div>
                    <a class="fancybox" data-fancybox-group="gallery" href="<?php echo Yii::app()->getBaseUrl(true).'/images/uploads/products/origins/'.$image ?>">
                <?php echo  CHtml::image(Yii::app()->getBaseUrl(true).'/images/uploads/products/thumbs/'.$image,'',array('width'=>'60','height'=>'60','class'=>'product-thumb')); ?>
                    </a>
                </div>
            <?php } ?>

        </div>
    </div>
    <div class="overview">
        <h1><?php echo $model->name ?></h1>
        <p>Item # <?php echo $model->id ?></p>
        <hr>
        <h2>$ <?php echo number_format($model->price,2)  ?></h2>
        <?php if($model->custom_attributes): ?>
        <hr>
        <div class="attributes">
            <table style="width: 100%">
            <?php  foreach(unserialize($model->custom_attributes) as $attr_name => $attr_value){ ?>
                <tr>
                    <td><?php echo $attr_name ?></td>
                    <td><?php echo $attr_value ?></td>
                </tr>
            <?php } ?>
            </table>
        </div>
        <?php endif ?>
        <hr>
        <a class="btn btn-success" href=" <?php echo $model->ebay_url ?>">Buy now</a>
    </div>
    <div style="clear: both"></div>
    <div class="tabs-container">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
          <li class="active"><a href="#description" data-toggle="tab">Description</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="description">
              <?php echo $model->description ?>
          </div>

        </div>
        <div class="related-items">
            <?php $this->widget('bootstrap.widgets.TbListView',array(
            	'dataProvider'=>$relatedProducts,
                'template'=>"{items}", //this remove: Displaying #... of ... result
            	'itemView'=>'_view',
            )); ?>
        </div>
        <div style="clear: both"></div>
    </div>
</div>

<script>
    $(function(){
        $('.thumbs-container').jsCarousel({ onthumbnailclick: function (src) {
            return;
        }, autoscroll: false,scrollspeed:500, circular: true, masked: false, itemstodisplay: 3, orientation: 'h' });

        $('.fancybox').fancybox({

        				openEffect : 'elastic',
        				openSpeed  : 150,

        				closeEffect : 'elastic',
        				closeSpeed  : 150,

        				closeClick : true,

        				helpers : {
        					overlay : null
        				}
        });
    })
</script>
