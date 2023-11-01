<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Danh sách nhân viên';
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
                        'attribute' => 'employee_code',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return Html::a($model->employee_code, ['calendar', 'id' => $model->id]);
                        },
                        'contentOptions' => ['class' => 'visible-lg visible-md visible-sm'],
                        'headerOptions' => ['class'=>'visible-lg visible-md visible-sm'],
                    ],
                    [
                        'attribute' => 'username',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return Html::a($model->username, ['calendar', 'id' => $model->id]);
                        },
                    ],
                    [
                        'attribute' => 'sex',
                        'format' => 'raw',
                        'value' => function ($model) {
                            $dataSex = $model->getSex($model->sex);
                            return $dataSex->name;
                        },
                        'contentOptions' => ['class' => 'visible-lg'],
                        'headerOptions' => ['class' => 'visible-lg'],
                    ],
                    [
                        'attribute' => 'birthday',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return date("d-m-Y", strtotime($model->birthday));
                        },
                        'contentOptions' => ['class' => 'visible-lg'],
                        'headerOptions' => ['class'=>'visible-lg'],
                    ],
                    [
                        'attribute' => 'phone_number',
                        'format' => 'raw',
                        'contentOptions' => ['class' => 'visible-lg'],
                        'headerOptions' => ['class'=>'visible-lg'],
                    ],
                    [
                        'attribute' => 'position_id',
                        'format' => 'raw',
                        'value' => function ($model) {
                            $dataPosition = $model->getPosition($model->position_id);
                            return $dataPosition->name;
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
                    [
                        'format' => 'raw',
                        'value' => function ($model) {
                            return Html::a('<i class="fa fa-eye"></i> Lịch chấm công', ['calendar', 'id' => $model->id]);
                        },
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
