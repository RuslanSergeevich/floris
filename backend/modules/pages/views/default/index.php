<?php

/* @var $this yii\web\View */
/* @var $dataProvider common\models\Pages */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use common\models\Pages;

$this->title = 'Общеинформационные страницы';
?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Список общеинформационных страниц представлен ниже</h3>
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
                    'id' =>'pages_box',
                    'rowOptions' => function($model){
                        return [
                            'id' => $model['id']
                        ];
                    },
                    'columns' => [
                        'id',
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{childs}',
                            'header' => 'Название',
                            'buttons' => [
                                'childs' => function($url, $model){
                                    $name = $model->publish ? $model->name : Html::tag('s', $model->name);
                                    return Pages::existsChilds($model->id)
                                        ? Html::a($name . Html::tag('i', '', [
                                                'class' => 'fa fa-fw fa-plus-square-o',
                                                'href' => '#child-box',
                                                'data-toggle' =>'modal'
                                            ]), $url, ['class' => 'child'])
                                        : $name;
                                }
                            ],
                        ],
                        'alias',
                        [
                            'attribute' => 'publish',
                            'header' => 'Публикация',
                            'format' => 'html',
                            'value' => function ($model) {
                                return Pages::getStatusesIcon($model->publish);
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
                echo Html::tag('div', Html::a('Добавить', Url::toRoute(['/pages/add']), ['class' => 'btn btn-block btn-primary']), [
                    'class' => 'button-add'
                ]);
                ?>
            </div>
        </div>
    </div>
</div>
<?= Html::tag('div', '', ['id' => 'child-box', 'class' => 'modal fade', 'data' => [
    'backdrop' => ''
]])?>
<?php $this->registerCssFile(Url::toRoute('/lte/css/jquery.jgrowl.min.css'));?>
<?php $this->registerJsFile(Url::toRoute('/lte/js/jquery.jgrowl.min.js'),['depends'=>'yii\web\JqueryAsset']);?>
<?php $this->registerJsFile(Url::toRoute('/lte/js/pages_main_bundle.js'),['depends'=>'backend\assets\AppAsset']);?>