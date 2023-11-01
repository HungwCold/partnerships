<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TypeRooms */

$this->title = 'Tạo loại phòng';
$this->params['breadcrumbs'][] = ['label' => 'Type Rooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-rooms-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
