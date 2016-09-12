<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\StringHelper;
?>

<a href="<?= \yii\helpers\Url::toRoute([$model['sub_link'].'/view', 'alias' => $model['alias']])?>"><?= Html::encode($model['name'])?></a>
<span><?= Yii::$app->request->getHostInfo()?><?= \yii\helpers\Url::toRoute([$model['sub_link'].'/view', 'alias' => $model['alias']])?></span>
<?= HtmlPurifier::process(StringHelper::truncateWords(str_replace('[image]', '', $model['text']), 25))?>