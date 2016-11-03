<?php

/* @var $this yii\web\View */
/* @var $dataProvider @common\models\Catalog */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use common\models\Catalog;

$this->title = 'Каталог';
?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Каталог</h3>
                <div class="box-tools">
                    <div class="input-group" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Поиск" />
                        <div class="input-group-btn">
                            <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <?php
                echo GridView::widget([
                    'dataProvider' => $dataProvider,
                    'summary' => false,
                    'tableOptions' => ['class' => 'table table-hover'],
                    'columns' => [
                        'id',
                        [
                            'attribute' => 'name',
                            'header' => 'Название',
                            'value' => function ($model) {
                                return $model->publish ? $model->name : Html::tag('s', $model->name);
                            },
                            'format' => 'html'
                        ],
                        [
                            'attribute' => 'publish',
                            'header' => 'Публикация',
                            'format' => 'html',
                            'value' => function ($model) {
                                return Catalog::getStatusesIcon($model->publish);
                            },
                        ],
                        [
                            'attribute' => 'created_at',
                            'header' => 'Создана',
                            'value' => function ($model) {
                                return Yii::$app->formatter->asDate($model->created_at);
                            },
                        ],
                        [
                            'attribute' => 'updated_at',
                            'header' => 'Обновлена',
                            'value' => function ($model) {
                                return Yii::$app->formatter->asRelativeTime($model->updated_at);
                            },
                        ],
                        'pos',
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Товары',
                            'template' => '{items}',
                            'buttons' => [
                                'items' => function($url){
                                    return Html::a('Перейти', $url, ['class' => 'btn btn-block btn-info btn-sm']);
                                }
                            ],
                        ],
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Редактирование',
                            'template' => '{update} {delete}',
                            'buttons' => [
                                'update' => function($url){
                                    return Html::a('<i class="fa fa-fw fa-pencil"></i>', $url);
                                },
                                'delete' => function($url){
                                    return Html::a('<i class="fa fa-fw fa-remove"></i>', $url, [
                                        'data' => [
                                            'confirm' => 'Вы уверены, что хотите удалить?',
                                            'method' => 'post',
                                        ]]);
                                }
                            ],
                        ],
                    ],
                ]);
                echo Html::tag('div', Html::a('Добавить', Url::toRoute(['/catalog/add']), ['class' => 'btn btn-block btn-primary']), [
                    'class' => 'button-add'
                ]);
                ?>

                <div style="padding: 20px">
                    <p>Каталог в PDF</p>
                    <?php $pdf = \common\models\Pdf::find()->where(['id' => 1])->one();?>
                    <?php if($pdf && $pdf->name != ''):?>
                        <p><?php echo $pdf->name; ?></p>
                    <?php endif;?>
                    <form method="post" enctype="multipart/form-data" action="<?php echo Url::toRoute(['/catalog/addpdf'])?>">
                        <input type="file" name="pdf">
                        <button style="margin-left:0px" class="button-add btn btn-primary" type="submit">Загрузить</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>