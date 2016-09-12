<?php

use yii\helpers\Html;
use common\models\Blog;
use yii\helpers\Url;
use common\models\Subscribers;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Pages */
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
<section class="blog">
    <div class="blog-header"></div>
    <div class="inner">
        <aside class="side-left"></aside>
        <aside class="side-right">
            <?php if(isset($model->boxes['banner'])):?>
            <div class="b-module">
                <?= Html::img('@boxes/' . $model->boxes['banner']['image'])?>
            </div>
            <?php endif;?>
            <div class="b-module rss">
                <?= Yii::$app->session->hasFlash('message') ? Html::tag('legend', Yii::$app->session->getFlash('message'), ['class' => 'flash_message']) : ''?>
                <h3>
                    Подписывайтесь на наш блог
                </h3>
                <?= $this->render('/partials/_subscribe_form', ['model' => new Subscribers()])?>
            </div>
            <div class="b-module rss screen">
                <h3>
                    Популярные тэги
                </h3>
            </div>
        </aside>
        <div class="b-content">
        <?php if ($model = Blog::getAllBlogs()):?>
            <?php foreach ($model as $blog): ?>
                <article>
                    <h2>
                        <?= Html::a($blog['name'], Url::to(['blog/view', 'alias' => $blog['alias']]))?>
                    </h2>
                    <div class="date">
                        <?= Yii::$app->formatter->asRelativeTime($blog['created_at'])?>
                    </div>
                    <?php if($blog['image']):?>
                        <div class="media">
                            <?= Html::img('@blog/' . $blog['image'], ['alt' => '', 'title' => ''])?>
                        </div>
                    <?php endif;?>
                    <?= StringHelper::truncate(str_replace('[image]','', strip_tags($blog['text'],'<p>')), 700)?>
                </article>
            <?php endforeach; ?>
        <?php endif; ?>
        </div>
    </div>
</section>