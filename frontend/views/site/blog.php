<?php

use yii\helpers\Html;
use common\models\Blog;
use yii\helpers\Url;

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
        <aside class="side-right">
            <div class="b-module screen">
                <img src="/images/banner.jpg" alt="">
            </div>
            <div class="b-module rss">
                <h3>
                    Подписывайтесь на наш блог
                </h3>
                <form>
                    <input type="text" placeholder="Введите ваш e-mail"><input class="btn border" type="submit" value="ПОДПИСАТЬСЯ">
                </form>
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
                    <?= str_replace('[image]','',$blog['text'])?>
                </article>
            <?php endforeach; ?>
        <?php endif; ?>
        </div>
    </div>
</section>