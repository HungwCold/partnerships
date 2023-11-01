<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SubusersHotel */

$this->title = 'Tạo nhân viên';
?>
<div class="subusers-hotel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dataPosition' => $dataPosition,
        'dataSex' => $dataSex,
    ]) ?>

</div>
