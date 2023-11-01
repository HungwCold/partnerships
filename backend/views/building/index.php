<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BuildingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách tòa nhà của khách sạn';

?>
<div class="building-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('<i class="fa fa-plus"></i> Tạo Building', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
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
                        },
                    ],
                    [
                        'attribute' => 'user_id',
                        'format' => 'raw',
                        'value' => function ($model) {
                            $dataAddress = $model->getAddressBuilding($model->address_id);
                            return $dataAddress->name_hotel;
                        },
                    ],
                    [
                        'attribute' => 'address_id',
                        'format' => 'raw',
                        'value' => function ($model) {
                            $dataAddress = $model->getAddressBuilding($model->address_id);
                            return $dataAddress->address .', '. $dataAddress->ward .', '. $dataAddress->district .', '. $dataAddress->city;
                        },
                        'contentOptions' => ['class' => 'visible-lg visible-md visible-sm'],
                        'headerOptions' => ['class'=>'visible-lg visible-md visible-sm'],
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
