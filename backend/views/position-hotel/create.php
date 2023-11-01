<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PositionHotel */

$this->title = 'Tạo chức vụ';
?>
<div class="position-hotel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
