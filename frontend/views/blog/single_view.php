<?php

use yii\helpers\Html;

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
            <article>
                <h2>
                    <?= $model['name']?>
                </h2>
                <div class="date">
                    <?= Yii::$app->formatter->asRelativeTime($model->created_at)?>
                </div>
                    <?= str_replace('[image]', Html::tag('div', Html::img('@blog/' . $model['image']), ['class' => 'media']), $model['text'])?>
            </article>
        </div>
    </div>
</section>