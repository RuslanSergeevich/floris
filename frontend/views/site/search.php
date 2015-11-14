<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pages */
/* @var $data frontend\models\SearchModel */
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
<div id="main">
  <section class="search">
    <div class="search-header"></div>
    <div class="inner">
      <h2 class="title">
        Поиск по сайту
      </h2>
      <?= $this->render('/partials/_search_form',['model' => new \frontend\models\SearchModel()])?>
      <?= Html::ul($data, ['item' => function($item) {
        return Html::tag(
            'li',
            $this->render('_item_search_view', ['model' => $item])
        );
      }]) ?>
    </div>
  </section>
</div>