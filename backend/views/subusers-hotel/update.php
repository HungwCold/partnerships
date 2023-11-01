<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SubusersHotel */

$this->title = 'Update Subusers Hotel: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Subusers Hotels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subusers-hotel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
