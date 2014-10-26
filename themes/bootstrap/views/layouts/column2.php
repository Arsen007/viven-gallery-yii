<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<style>
    .active{
        background-color: rgb(71, 71, 71)!important;
    }
</style>
<div class="row">
    <div class="span2">
        <div id="sidebar">
            <div class=side-bar-left>
                <div class=ind>
                    <div class=widget id=categories>


                        <div class=corner-bot-right>
                            <h2>Categories</h2>

                            <div class=inside-widget>
                                <ul>
                                    <?php
                                    if (isset($this->categories)) {
                                        foreach ($this->categories->findAll() as $category) {
                                            ?>
                                            <li class="cat-item cat-item-1<?php echo $this->currentCategory == $category->name?' active':'' ?>"><a
                                                    title="view all posts filed under praesent vestibu"
                                                    href="<?php echo $this->createAbsoluteUrl('category/'.$category->name.'.html') ?>"><?php echo $category->label ?></a>
                                            </li>
                                        <?php
                                        }

                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
<!--        --><?php
//            $this->beginWidget('zii.widgets.CPortlet', array(
//                'title'=>'Operations',
//            ));
//            $this->widget('bootstrap.widgets.TbMenu', array(
//                'items'=>$this->menu,
//                'htmlOptions'=>array('class'=>'operations'),
//            ));
//            $this->endWidget();
//        ?>
        </div><!-- sidebar -->
    </div>
    <div class="right-side">
        <div id="content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
</div>
<?php $this->endContent(); ?>