<?php /* @var $this controller */ ?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head profile=http://gmpg.org/xfn/11><title>art.zone</title>
    <meta http-equiv=content-type content="text/html; charset=utf-8">
    <?php yii::app()->bootstrap->register(); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo yii::app()->theme->baseurl; ?>/css/style.css"/>
    <style type="text/css">
        <!--
        body {
            margin-left: 0px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
        }
        -->
    </style>
</head>
<body>
<div class=min-width>
    <div class=main>
        <div class="bg-left png">
            <div class="bg-right png">
                <div class=bg-cont><!--header-->
                    <div id=header>
                        <div class=menu>
                            <?php $this->widget('zii.widgets.CMenu', array(
                                'items' => array(
                                    array(
//                                        'class'=>'bootstrap.widgets.TbMenu',
                                        'items' => array(
                                            array('label' => 'Home', 'url' => array('/home')),
                                            array('label'=>'Products', 'url'=>array('/products')),
                                            array('label' => 'About', 'url' => array('/about-us.html')),
                                            array('label' => 'Contact', 'url' => array('/contact-us.html')),
                                        ),
                                    ),
                                ),
                            )); ?>
                        </div>
                        <div class=search>
                            <form id=searchform
                                  style="padding-right: 0px; padding-left: 0px; padding-bottom: 0px; margin: 0px; padding-top: 0px"
                                  action=http://www.alixixi.com/wordpress_23793 method=get><input
                                    class=searching id=s name=s><input class=submit type=image
                                                                       src="images/search.gif" value=submit></form>
                        </div>
<!--                        <div class=logo>-->
<!--                            <h1>art.zone</h1></div>-->
                    </div>
                    <!--header end--><!--content -->
                    <div class=content>
                        <div class=clear-block>
                            <?php if (isset($this->breadcrumbs)): ?>
                                <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                      			'links'=>$this->breadcrumbs,
                      		)); ?><!-- breadcrumbs -->
                            <?php endif ?>
<!--                            <div class=side-bar-left>-->
<!--                                <div class=ind>-->
<!--                                    <div class=widget id=categories>-->
<!---->
<!---->
<!--                                        <div class=corner-bot-right>-->
<!--                                            <h2>categories</h2>-->
<!---->
<!--                                            <div class=inside-widget>-->
<!--                                                <ul>-->
<!--                                                    --><?php
//                                                    if (isset($this->categories)) {
//                                                        foreach ($this->categories->findAll() as $category) {
//                                                            ?>
<!--                                                            <li class="cat-item cat-item-1"><a-->
<!--                                                                    title="view all posts filed under praesent vestibu"-->
<!--                                                                    href="--><?php //echo $this->createAbsoluteUrl('category/'.$category->name.'.html') ?><!--">--><?php //echo $category->label ?><!--</a>-->
<!--                                                            </li>-->
<!--                                                        --><?php
//                                                        }
//
//                                                    }
//                                                    ?>
<!--                                                </ul>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!---->
<!--                                    </div>-->
<!---->
<!--                                </div>-->
<!--                            </div>-->
                            <div class="column-center">
                                <?php echo $content; ?>
                            </div>
                        </div>
                        <!--content end-->
                        <div id=footer>
                            <div class=foot>
                                Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
                                All Rights Reserved.<br/>
                                <?php echo Yii::powered(); ?>
                            </div>
                        </div>
                        <!--footer--></div>
                </div>
</body>
</html>
