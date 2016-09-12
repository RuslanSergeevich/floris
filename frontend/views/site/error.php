<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $message string */
/* @var $exception Exception */
$this->title = 'К сожалению запрашиваемая Вами страница не найдена.';

$this->title = Html::encode($this->title);
$this->registerMetaTag([
    'name' => 'description',
    'content' => Html::encode($this->title),
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => Html::encode($this->title)
]);
?>
<section class="page-404 b-top-section">
    <div class="title">
        404
    </div>
    <div class="sub-title">
        <?= nl2br(Html::encode($message)) ?>
    </div>
    <div class="btns">
        <?= Html::a('на главную', Yii::$app->homeUrl,['class' => 'btn'])?>
    </div>
</section>