<?php /* @var $this controller */ ?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head profile=http://gmpg.org/xfn/11><title>art.zone</title>
    <meta http-equiv=content-type content="text/html; charset=utf-8">
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
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="language" content="en"/>
    <title><?php echo chtml::encode($this->pagetitle); ?></title>
    <?php yii::app()->bootstrap->register(); ?>
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
                                            array('label' => 'Home', 'url' => array('/site/index')),
                                            array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
                                            array('label' => 'Contact', 'url' => array('/site/contact')),
                                            array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                                            array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
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
                        <div class=logo>
                            <h1>art.zone</h1></div>
                        <div class=description>only best art wirks</div>
                    </div>
                    <!--header end--><!--content -->
                    <div class=content>
                        <div class=clear-block>
                            <?php if (isset($this->breadcrumbs)): ?>
                                <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                      			'links'=>$this->breadcrumbs,
                      		)); ?><!-- breadcrumbs -->
                            <?php endif ?>
                            <div class=side-bar-left>
                                <div class=ind>
                                    <div class=widget id=categories>


                                        <div class=corner-bot-right>
                                            <h2>categories</h2>

                                            <div class=inside-widget>
                                                <ul>
                                                    <li class="cat-item cat-item-3"><a
                                                            title="view all posts filed under aenean nummy"
                                                            href="http://www.alixixi.com/wordpress_23793/?cat=3">aenean
                                                            nummy</a>
                                                    <li class="cat-item cat-item-6"><a
                                                            title="view all posts filed under cum sociis bus"
                                                            href="http://www.alixixi.com/wordpress_23793/?cat=6">cum
                                                            sociis bus</a>

                                                    <li class="cat-item cat-item-8"><a
                                                            title="view all posts filed under fusce feugiat"
                                                            href="http://www.alixixi.com/wordpress_23793/?cat=8">fusce
                                                            feugiat</a>
                                                    <li class="cat-item cat-item-5"><a
                                                            title="view all posts filed under fusce suscipit"
                                                            href="http://www.alixixi.com/wordpress_23793/?cat=5">fusce
                                                            suscipit</a>

                                                    <li class="cat-item cat-item-9"><a
                                                            title="view all posts filed under morbi nunc odio"
                                                            href="http://www.alixixi.com/wordpress_23793/?cat=9">morbi
                                                            nunc
                                                            odio</a>
                                                    <li class="cat-item cat-item-7"><a
                                                            title="view all posts filed under nulla dui"
                                                            href="http://www.alixixi.com/wordpress_23793/?cat=7">nulla
                                                            dui</a>
                                                    <li class="cat-item cat-item-4"><a
                                                            title="view all posts filed under phasellus porta"
                                                            href="http://www.alixixi.com/wordpress_23793/?cat=4">phasellus
                                                            porta</a>
                                                    <li class="cat-item cat-item-1"><a
                                                            title="view all posts filed under praesent vestibu"
                                                            href="http://www.alixixi.com/wordpress_23793/?cat=1">praesent
                                                            vestibu</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
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
