<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TypeRooms */

$this->title = 'Update Type Rooms: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Type Rooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="type-rooms-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
