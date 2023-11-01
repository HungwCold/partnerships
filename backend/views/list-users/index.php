<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ListUsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách khách hàng';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="list-users-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fa fa-plus"></i> Tạo khách hàng', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('<i class="fa fa-plus"></i> Upload CSV', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="panel panel-default">
        <div class="panel-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'rowOptions'=> function ($model) {
                    if (in_array(Yii::$app->user->id, json_decode($model->list_users_hotel))) {
                        return ['class' => ''];
                    } else {
                        return ['class' => 'hide'];
                    }
                },
                'tableOptions' => [
                    'class'=>'table table-striped table-bordered table-hover'
                ],
                'layout'=> "{items}\n{summary}\n{pager}",
                'summaryOptions' => [
                    'class' => 'pull-right'
                ],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'username',
                    'phone_number',
                    'email:email',
                    [
                        'attribute' => 'id_user_type',
                        'format' => 'raw',
                        'value' => function ($model) {
                            $dataType = $model->getUserType($model->id_user_type);
                            return $dataType->name;
                        },
                    ],
                    'created_at',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>

</div>
