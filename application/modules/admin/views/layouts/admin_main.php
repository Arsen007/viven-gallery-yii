<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
    <script>
        var base_url = '<?php echo Yii::app()->createAbsoluteUrl(false); ?>';
    </script>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php

$this->widget('bootstrap.widgets.TbNavbar',array(
    'brand' =>'Viven Gallery Admin',
    'brandUrl' =>$this->createAbsoluteUrl('dashboard/index'),
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'Products', 'url'=>array('/admin/products/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Attributes', 'url'=>array('/admin/ProductAttributes/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Categories', 'url'=>array('/admin/ProductCategories/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Subcategories', 'url'=>array('/admin/productSubcategories/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Pages', 'url'=>array('/admin/pages/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'News Manager', 'url'=>array('/admin/news/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/admin/auth/logout'), 'visible'=>!Yii::app()->user->isGuest),
            ),
        ),
    ),
)); ?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'homeLink'=>CHtml::link('Admin Panel', $this->createAbsoluteUrl('dashboard/index'))
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> Arsen Sargsyan.<br/>
		All Rights Reserved.<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
