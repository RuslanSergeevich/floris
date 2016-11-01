<?php
use frontend\components\DDWidget;
use common\models\Composition;
use common\models\Packing;
use common\models\Weight;
?>
<div class="cataloge-filter">
    <div class="inner">
        <div id="data-composition_id" class="hidden">0</div>
        <div id="data-packing_id" class="hidden">0</div>
        <?= DDWidget::widget([
            'model' => Composition::getList(),
            'css_class' => 'comp',
            'entity_db' => 'data-composition_id'
        ])?>
        <?= DDWidget::widget([
            'model' => Packing::getList(),
            'css_class' => 'pack',
            'entity_db' => 'data-packing_id'
        ])?>
        <?= DDWidget::widget([
            'model' => Weight::getList(),
            'css_class' => 'slider filter-weight weight',
            'entity_db' => 'data-weight_id'
        ])?>
        <?php $pdf = \common\models\Pdf::find()->where(['id' => 1])->one(); ?>
        <?php if($pdf):?>
            <?php $uploaddir = Yii::getAlias('@frontend').'/web/userfiles/pdf/';?>
            <?php $pdf_file = $uploaddir . $pdf->name;?>
            <?php if(file_exists($pdf_file)):?>
                <a href="/userfiles/pdf/<?php echo $pdf->name?>" class="pdf--button">Скачать каталог</a>
            <?php endif;?>
        <?php endif;?>

    </div>
</div>