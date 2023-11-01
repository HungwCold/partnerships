<?php

namespace backend\widgets\reports;

use yii\base\Widget;
use yii\bootstrap\Button;
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

        $dataProvider = new ActiveDataProvider
        ([
            'query' => Post::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        echo ListView::widget
        ([
            'dataProvider' => $dataProvider,
            'itemView' => '_post',
        ]);
?>
        <?php
use yii\helpers\HtmlPurifier;
?>
<div class="post">
    <h2><?= Html::encode($model->title) ?></h2>

    <?= HtmlPurifier::process($model->text) ?>    
</div>


]);















?>