<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\CatalogItems */
$this->title = Html::encode($model->title);
$this->registerMetaTag([
    'name' => 'description',
    'content' => Html::encode($model->description),
    ]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => Html::encode($model->keywords)
    ]);
    ?>

    <section class="product">
        <div class="product-header"></div>
        <div class="product-selecter">
            <div class="b-top">
                <?= \common\models\Packing::getValueById($model->packing_id)?>
            </div>
            <div class="inner">
                <?= Html::ul(\common\models\CatalogItems::getItemsByPacking($model->packing_id,$model->id), ['item' => function($item) {
                    $img = isset($item['galleryImages'][0]['basename']) ? Html::img('@gallery/'.$item['galleryImages'][0]['basename'].'.'.$item['galleryImages'][0]['ext']) : '';
                    return Html::tag(
                        'li',
                        Html::a($img, \yii\helpers\Url::to(['product/view', 'alias' => $item['alias']]))
                        );
                    }]) ?>       
                </div>
            </div>
            <div class="inner">
                <div class="product-card">
                    <div class="img">
                        <?= Html::ul($model['galleryImages'], ['item' => function($item) {
                            return Html::tag(
                                'li',
                                Html::a(Html::img('@gallery/' . $item['basename'] .'.'. $item['ext'],
                                    ['alt' => '', 'rel' => 'product']),
                                Yii::getAlias('@gallery/'.$item['basename'] .'.'. $item['ext']),
                                [
                                'class' => 'fancybox'
                                ])
                                );
                            }]) ?>
                            <div id="bx-pager" class='bx-pager'>
                                <?php $i = 0;?>
                                <?php if($model['galleryImages']):?>
                                    <?php foreach($model['galleryImages'] as $item):?>
                                        <a data-slide-index="<?php echo $i;?>" href="<?php echo '/userfiles/gallery/' . $item['basename'] .'.'. $item['ext']?>"><img src="<?php echo '/userfiles/gallery/' . $item['basename'] .'.'. $item['ext']?>" /></a>
                                        <?php $i++;?>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="description">
                            <div class="top">
                                <div class="social social-posit">
                                    <?= Html::a('','http://vk.com/floristea',['class' => 'fb', 'target' => '_blank'])?>
                                    <?= Html::a('','https://www.facebook.com/floristea/',['class' => 'insta', 'target' => '_blank'])?>
                                    <?= Html::a('','https://www.instagram.com/floristea/',['class' => 'vk', 'target' => '_blank'])?>
                                </div>
                                <h1 class="title-page">
                                    <?= $model->name?><span><?= \common\models\Packing::getValueById($model->packing_id)?></span>
                                </h1>
                            </div>
                            <div class="b-text b-text--no-border ">
                                <?= $model->text?>
                                <div class="card-text clr">
                                    <div class="card-text__left">
                                        <?php if(!empty($model->compositions)):?>
                                            <p><strong>Состав:</strong></p>
                                            <?php echo $model->compositions?>
                                        <?php endif;?>
                                    </div>
                                    <!-- /.card-text__left -->
                                    <div class="card-text__right">

                                        <?php if($model->status == 0):?>
                                            <div class="card-text__title card-text__title--stock ">В наличии</div>
                                            <!-- /.card-text__title -->
                                        <?php elseif($model->status ==1):?>

                                            <div class="card-text__title card-text__title--production ">Заканчивается</div>
                                            <!-- /.card-text__title -->
                                        <?php elseif($model->status == 2):?>

                                            <div class="card-text__title card-text__title--end ">В производстве</div>
                                            <!-- /.card-text__title -->

                                        <?php endif;?>

                                        <?php if($price->getWhole() != 0):?>
                                            <div class="card-text__prise"><b><?php echo $price->getWhole()?></b> цена розничная</div>
                                        <?php endif;?>
                                        <!-- /.card-text__prise -->
                                        <?php if($price->getRetail() != 0):?>
                                            <div class="card-text__prise card-text__prise--black"><b><?php echo $price->getRetail()?></b> ваша цена</div>
                                        <?php endif;?>
                                        <!-- /.card-text__prise -->
                                        <!--<div class="card-text__prise"><b></b> цена дилерская</div>-->
                                        <!-- /.card-text__prise -->
                                        <a href="#sotrudnichestvo" class="fancybox card-text__button">купить</a>
                                        <!-- /.card-text__button -->
                                        <a href="/contacts" class="card-text__info">
                                            Спец-условия дилерам<br />
                                            при заказе более 50 тыс.
                                        </a>
                                        <!-- /.card-text__info -->
                                    </div>
                                    <!-- /.card-text__right -->

                                </div>
                                <!-- /.card-text -->
                                <p>&nbsp;</p>
                                <ul class="logistic-info">
                                    <?php if($model->weight_id):?>
                                        <li>
                                            <img src="/images/icons/kartochka/ves.svg" alt="" height="50">
                                            <p><?= \common\models\Weight::getValueById($model->weight_id)?> г</p>
                                        </li>
                                    <?php endif;?>

                                    <?php if($model->time):?>
                                        <li>
                                            <img src="/images/icons/kartochka/min.svg" alt="" height="50">
                                            <p><?= $model->time?></p>
                                        </li>
                                    <?php endif;?>

                                    <?php if($model->portions):?>
                                        <li>
                                            <img src="/images/icons/kartochka/porcii.svg" alt="" height="50">
                                            <p><?= $model->portions?></p>
                                        </li>
                                    <?php endif;?>
                                </ul>
                            </div>
                            <!--<a class="btn green fancybox" href="#sotrudnichestvo">КУПИТЬ ОПТОМ</a>-->
                        </div>
                    </div>
                </div>

                <div class="l-inform clr">
                    <?php if(!empty($model->logistic_info)):?>
                        <p>
                            <?php echo $model->logistic_info?>
                        </p>
                    <?php endif;?>
                </div>

                <div class="comments">
                  <script type="text/javascript">
                    VK.init({apiId: 5682360, onlyWidgets: true});
                  </script>
                  
                  <!-- Put this div tag to the place, where the Comments block will be -->
                  <div id="vk_comments"></div>
                  <script type="text/javascript">
                  VK.Widgets.Comments("vk_comments", {limit: 10, attach: "*"});
                  </script>
                </div>
                <!-- /.comments -->
    </section>   
