<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Floors */

$this->title = 'Tạo tầng lầu';
?>
<div class="floors-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'building' => $building,
    ]) ?>

</div>
