<?php
/* @var $this ProductsController */
/* @var $model Products */
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl . '/js/products.js');
$cs->registerScriptFile($baseUrl . '/js/jquery.validate.js');
$cs->registerScriptFile($baseUrl . '/js/additional-methods.js');
$cs->registerCssFile($baseUrl . '/css/products.css');
$cs->registerCssFile($baseUrl.'/css/jquery.fancybox.css');
$cs->registerScriptFile($baseUrl.'/js/jquery.fancybox.js');

$this->breadcrumbs = array(
    'Products' => array('admin'),
    'Create',
);

$this->menu = array(
    array('label' => 'List Products', 'url' => array('index')),
    array('label' => 'Manage Products', 'url' => array('admin')),
);
?>

<h1>Create Products</h1>

<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'attributes' => $attributes,
    'categories' => $categories,
    'subcategories' => $subcategories,
    'relatedProducts' => array()
));
?>

<script>
    var url_check = "<?php echo '/admin/products/uniquecheck'; ?>";
    var uniquie_check = true;
    $(function() {
        jQuery.validator.addMethod("price", function(value, element) {
            return this.optional(element) || /^\d{0,4}(\.\d{0,2})?$/i.test(value);
        }, "Wrong price format");
        jQuery.validator.addMethod("url", function(value, element) {
            return this.optional(element) || /[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?/i.test(value);
        }, "Wrong URL format");
        jQuery.validator.addMethod("url_name", function(value, element) {
            return this.optional(element) || /^[0-9a-zA-Z_-]+$/i.test(value);
        }, "Wrong URL name  format");
        $("#products-form").validate({
            rules: {
                "Products[name]": {
                    required: true,
                    minlength: 3,
                },
                "Products[price]": {
                    required: true,
                    price: true
                },
                "Products[url_name]": {
                    required: true,
                    url_name: true,
                    remote: {
                        url: url_check,
                        
                        type: "POST",
                        data: {
                            url_name: function() {
                                return $("#Products_url_name").val();
                            }
                        }
                    }
                },
                "Products[ebay_url]": {
                    required: true,
                    url: true
                }},
            messages: {
                "Products[url_name]": {
                    remote: "Please enter unique URL name"
                }
            }

        });
    });

</script> 