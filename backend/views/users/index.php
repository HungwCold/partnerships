<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Json;


$this->title = 'Danh sách tài khoản';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_search', ['model' => $searchModel]); ?>

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
                        return '<img src="https://graph.facebook.com/'.$model->uid.'/picture?type=small&access_token='. $model->getApiKey().'" width="50" height="50" alt="'.$model->name.'">';
                    }
                ],
                'first_name',
                'last_name',
                'birthday',
                'gender',
                'name',
                'relationship_status',
                'locale',
                'username',
            ],
    ]); ?>
</div>
