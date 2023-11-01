<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TimesheetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Timesheets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="timesheet-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Timesheet', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'employee_id',
            'date',
            'time_from',
            'time_to',
            //'comment',
            //'date_submitted',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
