<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BuildingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách phòng';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="building-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fa fa-plus"></i> Tạo phòng', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', [
        'model' => $searchModel,
        'dataStatus' => $dataProviderStatus,
        'dataType' => $dataTypeRoom
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
                    [
                        'attribute' => 'name_room',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return Html::a("<i class='fa fa-eye'></i> ".$model->name_room, ['view', 'id' => $model->id]);
                        },
                    ],
                    [
                        'attribute' => 'status',
                        'format' => 'raw',
                        'value' => function ($model) {
                            $dataStatus = $model->getStatusRoom($model->status);
                            return $dataStatus->status;
                        },
                    ],
                    [
                        'attribute' => 'type',
                        'format' => 'raw',
                        'value' => function ($model) {
                            $dataStatus = $model->getTypeRoom($model->type);
                            return $dataStatus->name;
                        },
                        'contentOptions' => ['class' => 'visible-lg visible-md visible-sm'],
                        'headerOptions' => ['class'=>'visible-lg visible-md visible-sm'],
                    ],
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
