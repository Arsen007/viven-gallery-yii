<?php
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/ckeditor/ckeditor.js');
$cs->registerScriptFile($baseUrl.'/js/ckeditor/jquery-ck_editor.js');
$cs->registerScriptFile($baseUrl.'/js/news.js');
$cs->registerCssFile($baseUrl.'/css/news.css');
$cs->registerScriptFile($baseUrl . '/js/jquery.validate.js');

$this->breadcrumbs=array(
	'News'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List News','url'=>array('index')),
	array('label'=>'Manage News','url'=>array('admin')),
);
?>

<h1>Create News</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<script>
    var url_check = "<?php echo '/admin/news/uniquecheck'; ?>";
    var uniquie_check = true;
    var news_id = "<?php echo $model->id; ?>"
    $(function() {

        jQuery.validator.addMethod("url_name", function(value, element) {
            return this.optional(element) || /^[0-9a-zA-Z_-]+$/i.test(value);
        }, "Wrong URL name  format");
        $("#news-form").validate({
            rules: {
                "News[title]": {
                    required: true,
                    minlength: 3
                },
                "News[url_name]": {
                    required: true,
                    url_name: true,
                    remote: {
                        url: url_check,
                        type: "POST",
                        data: {
                            url_name: function() {
                                return $("#News_url_name").val();
                            },
                            id: function() {
                                return news_id;
                            }
                        }
                    }
                }


        },
            messages: {
                "News[url_name]": {
                    remote: "This URL name is already used enter another please."
                }
            }
        })
    });

</script>
