<?php
/* @var $this ProductsController */
/* @var $model Products */
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/products.js');
$cs->registerScriptFile($baseUrl.'/js/products.js');
$cs->registerScriptFile($baseUrl . '/js/jquery.validate.js');
$cs->registerCssFile($baseUrl.'/css/products.css');

$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Products', 'url'=>array('index')),
	array('label'=>'Create Products', 'url'=>array('create')),
	array('label'=>'View Products', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Products', 'url'=>array('admin')),
);
?>

<h1>Update Products <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array(
    'model'=>$model,
    'attributes' => $attributes,
    'categories' => $categories
)); ?>


<script>
    var url_check = "<?php echo '/admin/products/uniquecheck'; ?>";
    var uniquie_check = true;
    var product_id =  "<?php echo $model->id; ?>"
    $(function() {

        $("#products-form").validate({
            rules: {
                "Products[name]": {
                    required: true,
                    minlength: 3,
                },
                "Products[price]": {
                    required: true,
                },
                "Products[url_name]": {
                    required: true,
                    remote: {
                        url: url_check,
                        type: "POST",
                        data: {
                            
                            url_name: function() {
                                return $("#Products_url_name").val();
                            },
                            id: function() {
                                return product_id;
                            }
                        }
                    }
                }},
            messages: {
                "Products[url_name]": {
                   
                    remote: "Please enter unique URL name"
                }
            }

        });
    });

</script> 