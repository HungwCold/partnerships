<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ServicesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách dịch vụ';
$this->params['breadcrumbs'][] = $this->title;

$status = [
    0 => [
        'id' => 0,
        'name' => 'Kích Hoạt'
    ],
    1 => [
        'id' => 1,
        'name' => 'Chưa Kích Hoạt'
    ],
];

?>
<div class="services-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fa fa-plus"></i> Tạo dịch vụ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= $this->render('_search', [
        'model' => $searchModel,
        'modelPUnit' => $modelPUnit,
        'modelStatus' => $status,
    ]
    ); ?>
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
                    'name',
                    [
                        'attribute' => 'product_unit_id',
                        'format' => 'raw',
                        'value' => function ($model) {
                            $dataProductUnit = $model->getProductUnit($model->product_unit_id);
                            return '<span class="label label-warning label-sm">'.$dataProductUnit->name.'</span>';
                        },
                        'contentOptions' => ['class' => 'visible-lg visible-md visible-sm'],
                        'headerOptions' => ['class'=>'visible-lg visible-md visible-sm'],
                    ],
                    [
                        'attribute' => 'price_import',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->formatPrice($model->price_import);
                        },
                        'contentOptions' => ['class' => 'visible-lg visible-md visible-sm'],
                        'headerOptions' => ['class'=>'visible-lg visible-md visible-sm'],
                    ],
                    [
                        'attribute' => 'price_export',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->formatPrice($model->price_export);
                        },
                        'contentOptions' => ['class' => 'visible-lg visible-md visible-sm'],
                        'headerOptions' => ['class'=>'visible-lg visible-md visible-sm'],
                    ],
                    'note:ntext',
                    [
                        'attribute' => 'status',
                        'format' => 'raw',
                        'value' => function ($model) {
                            
                            return $model->status == 0 ? 'Kích Hoạt' : 'Chưa Kích Hoạt';
                        },
                        'contentOptions' => ['class' => 'visible-lg visible-md visible-sm'],
                        'headerOptions' => ['class'=>'visible-lg visible-md visible-sm'],
                    ],
                    [
                        'attribute' => 'created_at',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return date("d-m-Y", strtotime($model->created_at));
                        },
                    ],
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
