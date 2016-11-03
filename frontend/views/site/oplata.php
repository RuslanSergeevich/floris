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
<section class="about">
    <div class="top-block b-top-section top-section">
        <div class="title">
            <?= $model->name?>
        </div>
    </div>
    <div class="b-content">
        <div class="inner">
            <?= $model->text?>
        </div>    
    </div>
</section>