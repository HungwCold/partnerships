<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PositionHotelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Chức vụ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="position-hotel-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fa fa-plus"></i> Tạo chức vụ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
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
                    'basic_pay',
                    'created_at',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>

        </div>
    </div>
</div>
