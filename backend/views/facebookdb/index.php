<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Facebook Database Ads User';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="facebookdb-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fa fa-plus"></i> Tạo nhanh', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('<i class="fa fa-plus"></i> Tạo nhanh Json', ['/facebookdb/json'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('<i class="fa fa-plus"></i> Tạo nhanh loại', ['/facebooktype/create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('<i class="fa fa-plus"></i> Api key update', ['/facebookdb/api'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('<i class="fa fa-plus"></i> Token update', ['/facebookdb/token'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('<i class="fa fa-plus"></i> Gửi SMS Zalo', ['/facebookdb/token-zalo'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissable">
             <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
             <h4><i class="icon fa fa-check"></i>Saved!</h4>
             <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>
    <?= $this->render('_search', [
        'model' => $searchModel,
        'modelType' => $modelType,
    ]); ?>
    <div class="panel panel-default">
        <div class="panel-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'layout'=> "{items}\n{summary}\n{pager}",
                'summaryOptions' => [
                    'class' => 'pull-right'
                ],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'uid',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return '<a href="https://www.facebook.com/'.$model->uid.'" target="_blank">'.$model->uid.'</a>';
                        },
                        'contentOptions' => ['class' => 'visible-lg visible-md visible-sm'],
                        'headerOptions' => ['class'=>'visible-lg visible-md visible-sm'],
                    ],
                    [
                        'header' => 'Hình đại diện',
                        'attribute' => 'uid',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return '<img src="https://graph.facebook.com/'.$model->uid.'/picture?type=small&access_token='.$model->getApiKey().'" width="50" height="50" alt="'.$model->name.'">';
                        }
                    ],
                    'name',
                    [
                        'attribute' => 'phone',
                        'format' => 'raw',
                        'contentOptions' => ['class' => 'visible-lg visible-md visible-sm'],
                        'headerOptions' => ['class'=>'visible-lg visible-md visible-sm'],
                    ],
                    [
                        'attribute' => 'comment',
                        'format' => 'raw',
                        'value' => function ($model) {
                            if (isset($model->comment)) {
                               $data = $model->getTypeUser($model->comment);
                               return $data->name;
                            } else{
                               return 'Live'; 
                            } 
                        }
                    ],
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
