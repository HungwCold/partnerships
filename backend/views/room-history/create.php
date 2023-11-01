<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RoomHistory */

$this->title = 'Tạo Room History';
$this->params['breadcrumbs'][] = ['label' => 'Room Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-history-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
