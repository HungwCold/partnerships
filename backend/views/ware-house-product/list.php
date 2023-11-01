<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Danh sách thực đơn';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subusers-hotel-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('<i class="fa fa-plus"></i> Tạo sản phẩm mới', ['create'], ['class' => 'btn btn-success']) ?>
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
                            return $model->name;
                        }
                    ],
                    [
                        'attribute' => 'warehouse_id',
                        'format' => 'raw',
                        'value' => function ($model) {
                            $dataWareHouse = $model->getWareHouse($model->warehouse_id);
                            return $dataWareHouse->name;
                        },
                        'contentOptions' => ['class' => 'visible-lg visible-md visible-sm'],
                        'headerOptions' => ['class'=>'visible-lg visible-md visible-sm'],
                    ],
                    [
                        'attribute' => 'group_food_id',
                        'format' => 'raw',
                        'content' => function ($model) {
                            $dataGroupFood = $model->getGroupFood($model->group_food_id);
                            return '<span class="label label-primary label-sm">'.$dataGroupFood->name.'</span>';
                        },
                        'contentOptions' => ['class' => 'visible-lg visible-md visible-sm'],
                        'headerOptions' => ['class'=>'visible-lg visible-md visible-sm'],
                    ],
                    [
                        'attribute' => 'product_unit_id',
                        'format' => 'raw',
                        'content' => function ($model) {
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
                            return $model->price_import;
                        },
                        'contentOptions' => ['class' => 'visible-lg visible-md visible-sm'],
                        'headerOptions' => ['class'=>'visible-lg visible-md visible-sm'],
                    ],
                    [
                        'attribute' => 'price_export',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->price_export;
                        },
                        'contentOptions' => ['class' => 'visible-lg visible-md visible-sm'],
                        'headerOptions' => ['class'=>'visible-lg visible-md visible-sm'],
                    ],
                    [
                        'attribute' => 'stock',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->stock;
                        },
                        'contentOptions' => ['class' => 'visible-lg visible-md visible-sm'],
                        'headerOptions' => ['class'=>'visible-lg visible-md visible-sm'],
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
