<?php

use yii\helpers\Html;
use common\models\Subscribers;

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