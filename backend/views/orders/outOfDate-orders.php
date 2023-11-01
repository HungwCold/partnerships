<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Danh sách quá hạn';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subusers-hotel-index">

    <h1><?= Html::encode($this->title) ?></h1>
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
                        'attribute' => 'id',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->id;
                        },
                        'contentOptions' => ['class' => 'visible-lg visible-md visible-sm'],
                        'headerOptions' => ['class'=>'visible-lg visible-md visible-sm'],
                    ],
                    [
                        'attribute' => 'order_number',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->order_number;
                        },
                    ],
                    [
                        'attribute' => 'user_id',
                        'format' => 'raw',
                        'value' => function ($model) {
                            $dataUser = $model->getUser($model->user_id);
                            return $dataUser->username;
                        },
                        'contentOptions' => ['class' => 'visible-lg'],
                        'headerOptions' => ['class' => 'visible-lg'],
                    ],
                    [
                        'attribute' => 'check_in',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return date("d-m-Y", strtotime($model->check_in));
                        },
                        'contentOptions' => ['class' => 'visible-lg'],
                        'headerOptions' => ['class'=>'visible-lg'],
                    ],
                    [
                        'attribute' => 'check_out',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return date("d-m-Y", strtotime($model->check_out));
                        },
                        'contentOptions' => ['class' => 'visible-lg'],
                        'headerOptions' => ['class'=>'visible-lg'],
                    ],
                    [
                        'attribute' => 'total_price',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->total_price;
                        },
                        'contentOptions' => ['class' => 'visible-lg'],
                        'headerOptions' => ['class'=>'visible-lg'],
                    ],
                    [
                        'attribute' => 'room_id',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return Html::a('<i class="fa fa-eye"></i> '.$model->room_id, ['rooms/view', 'id' => $model->room_id]);
                        },
                    ],
                    [
                        'attribute' => 'status_payment',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->getNameStatusPayment($model->status_payment);
                        },
                    ],
                    [
                        'attribute' => 'created_at',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return date("d-m-Y", strtotime($model->created_at));
                        },
                        'contentOptions' => ['class' => 'visible-lg'],
                        'headerOptions' => ['class'=>'visible-lg'],
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
