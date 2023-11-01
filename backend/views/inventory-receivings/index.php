<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Phiếu nhập hàng';
$this->params['breadcrumbs'][] = $this->title;
$listStatus = [
    '0' => [
        'id' => 1,
        'name' => 'Kích hoạt'
    ],
    '1' => [
        'id' => 2,
        'name' => 'Tắt kích hoạt'
    ],
];
?>
<div class="inventory-receivings-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fa fa-plus"></i> Tạo phiếu nhập hàng', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= $this->render('_search', [
        'model' => $searchModel,
        'modelWareHouse' => $modelWareHouse,
        'modelSubusersHotel' => $modelSubusersHotel,
        'modelSupplier' => $modelSupplier,
        'modelMoney' => $modelMoney,
        'modelStatus' => $listStatus,
    ]); ?>

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
                    'hotel_id',
                    'warehouse_id',
                    'supplier_id',
                    'money_fund_id',
                    'subusers_id',
                    'code_receiving',
                    'total_money',
                    'final_settlement',
                    'has_paid',
                    //'products:ntext',
                    //'note:ntext',
                    //'status',
                    //'created_at',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>

</div>
