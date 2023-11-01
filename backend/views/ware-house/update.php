<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WareHouse */

$this->title = 'Update Ware House: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Ware Houses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ware-house-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
