<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $message string */
/* @var $exception Exception */
$this->title = $name;
?>
<main>
    <section class="b1">
        <div class="title">
            <?= Html::encode($this->title) ?>
        </div>
        <div class="alert alert-danger alert-message">
            <?= nl2br(Html::encode($message)) ?>
            <p>
               <?= Html::a('ПЕРЕЙТИ НА ГЛАВНУЮ', Yii::$app->homeUrl, ['class' => 'btn'])?>
            </p>
        </div>
    </section>
</main>