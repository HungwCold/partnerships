<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SubusersHotelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách nhân viên';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subusers-hotel-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fa fa-plus"></i> Tạo nhân viên', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', [
        'model' => $searchModel,
        'dataPosition' => $modelPosition,
        'dataSex' => $modelSex,
    ]); ?>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="table-responsive">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'layout'=> "{items}\n{summary}\n{pager}",
                    'summaryOptions' => [
                        'class' => 'pull-right'
                    ],
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'username',
                        [
                            'attribute' => 'sex',
                            'format' => 'raw',
                            'value' => function ($model) {
                                $dataSex = $model->getSex($model->sex);
                                return $dataSex->name;
                            },
                        ],
                        [
                            'attribute' => 'birthday',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return date("d-m-Y", strtotime($model->birthday));
                            },
                        ],
                        'phone_number',
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
                        ],
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
