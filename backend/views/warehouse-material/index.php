<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WarehouseMaterialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách nguyên liệu trong kho';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="warehouse-material-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fa fa-plus"></i> Tạo nguyên liệu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <!-- <?= $this->render('_search', ['model' => $searchModel]); ?> -->
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
                        },
                        'contentOptions' => ['class' => 'visible-lg visible-md visible-sm'],
                        'headerOptions' => ['class'=>'visible-lg visible-md visible-sm'],
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
                    'price_import',
                    'price_export',
                    'stock',
                ],
            ]); ?>
        </div>
    </div>
</div>
