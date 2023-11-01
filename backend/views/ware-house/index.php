<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Danh sách kho hàng';
?>

<div class="subusers-hotel-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('<i class="fa fa-plus"></i> Tạo kho mới', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="panel panel-default">
        <div class="panel-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'tableOptions' => [
                    'class'=>'table table-striped table-bordered table-hover'
                ],
                'layout'=> "{items}\n{summary}\n{pager}",
                'summaryOptions' => [
                    'class' => 'pull-right'
                ],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'name',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return Html::a($model->name, ['update', 'id' => $model->id]);
                        }
                    ],
                    [
                        'attribute' => 'manager',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->manager;
                        },
                        'contentOptions' => ['class' => 'visible-lg visible-md visible-sm'],
                        'headerOptions' => ['class'=>'visible-lg visible-md visible-sm'],
                    ],
                    [
                        'attribute' => 'address',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->address;
                        },
                        'contentOptions' => ['class' => 'visible-lg visible-md visible-sm'],
                        'headerOptions' => ['class'=>'visible-lg visible-md visible-sm'],
                    ],
                    [
                        'attribute' => 'phone',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->phone;
                        },
                        'contentOptions' => ['class' => 'visible-lg visible-md visible-sm'],
                        'headerOptions' => ['class'=>'visible-lg visible-md visible-sm'],
                    ],
                    [
                        'attribute' => 'noted',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->noted;
                        },
                        'contentOptions' => ['class' => 'visible-lg visible-md'],
                        'headerOptions' => ['class'=>'visible-lg visible-md'],
                    ]
                ],
            ]); ?>
        </div>
    </div>
</div>
