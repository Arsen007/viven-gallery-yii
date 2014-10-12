<?php /* @var $this controller */ ?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head profile=http://gmpg.org/xfn/11><title><?php echo isset($this->pageTitle) ? $this->pageTitle : Yii::app()->name; ?></title>
    <meta http-equiv=content-type content="text/html; charset=utf-8">
    <?php yii::app()->bootstrap->register(); ?>
    <script src="<?php echo yii::app()->baseurl; ?>/js/common.js"></script>
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
//                                            array('label' => 'Home', 'url' => array('/home')),
                                            array('label'=>'Products', 'url'=>array('/products')),
                                            array('label'=>'News', 'url'=>array('/news')),
                                            array('label' => 'About', 'url' => array('/about-us.html')),
                                            array('label' => 'Contact', 'url' => array('/contact-us.html')),
                                        ),
                                    ),
                                ),
                            )); ?>
                        </div>
                        <div class="search-by-category-content">
                            <ul>
                            <?php
                               if (isset($this->categories)) {
                                   foreach ($this->categories->findAll() as $category) { ?>
                                       <li class="cat-item cat-item-1" style="font-size:16px;line-height: 30px;float: left;width: 130px;text-decoration: underline ">
                                           <a title="view all posts filed under praesent vestibu"
                                               href="<?php echo $this->createAbsoluteUrl('category/'.$category->name.'.html') ?>"><?php echo $category->label ?></a>
                                           </li>
                                   <?php
                                   }

                               }
                               ?>
                            </ul>
                        </div>
                        <div class=search>
                            <form id=searchform
                                  action="<?php echo Yii::app()->baseUrl.'/products/search'; ?>"  method=get>
                                <div id="shop-by-category" class="closed">Shop by<br>category<span class="gh-shop-ei">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></div>
                                    <input style="" name ="search" placeholder="Search" class="search-input"  id="search" >
                                    <select style="width: 140px" name = "search_category" class="search_category">
                                     <option value ="0">All Categories</option>
 <?php
                                    if (isset($this->categories)) {
                                        foreach ($this->categories->findAll() as $category) {
                                            ?>
                                        <option value="<?php echo $category->id; ?>"class="cat-item cat-item-1" <?php if(isset($this->currentCategory)){ echo $this->currentCategory == $category->name?' selected':'';} ?>><?php echo $category->label ?></option>
                                        <?php
                                        }

                                    }
                                    ?>
                                    </select>
                                    <button type="submit" class="search-btn">Go</button>
                            </form>
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
                      			'separator'=>'<span> / </span>',
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
                                Copyright &copy; <?php echo date('Y'); ?> by Vivien Art Gallery.<br/>
                                All Rights Reserved.<br/>
                                By Arsen Sargsyan
                            </div>
                        </div>
                        <!--footer--></div>
                </div>
</body>
</html>
<script>
    $(document ).ready(function() {
        $("#searchform button").click(function(e){
            if($("#search").val()=== ''){
                $('#search').focus();
                e.preventDefault();
        }
    });

    });
</script>