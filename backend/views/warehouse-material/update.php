<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WarehouseMaterial */

$this->title = 'Update Warehouse Material: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Warehouse Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="warehouse-material-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelWareHouse' => $modelWareHouse,
        'modelPUnit' => $modelPUnit,
        'modelGroupFood' => $modelGroupFood,
    ]) ?>

</div>
