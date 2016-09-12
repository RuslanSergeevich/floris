<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="cataloge-menu">
    <menu>
        <li class="<?= !isset($alias) ? 'active' : ''?>">
            <a href="/cataloge">Весь ассортимент</a>
        </li>
        <?php if ($models = \common\models\Types::getList()):?>
            <?php foreach ($models as $value): ?>
                <?= Html::tag('li', Html::a($value['name'], Url::toRoute(['type/view', 'alias' => $value['alias']])),[
                    'class' => (isset($alias) && $value['alias'] == $alias) ? 'active' : ''
                ])?>
            <?php endforeach; ?>
        <?php endif; ?>
    </menu>
</div>