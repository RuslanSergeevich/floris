<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Workers;

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
        <aside class="side-right"></aside>
        <div class="b-content">
            <article>
                <h2>
                    <?= $model->name?>
                </h2>
            </article>
        </div>
    </div>
</section>