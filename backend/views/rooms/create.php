<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rooms */

$this->title = 'Tạo phòng';
?>
<div class="rooms-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dataStatus' => $dataProviderStatus,
        'dataType' => $dataTypeRoom
    ]) ?>

</div>
