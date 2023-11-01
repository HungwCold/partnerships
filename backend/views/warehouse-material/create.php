<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WarehouseMaterial */

$this->title = 'Tạo nguyên liệu';
$this->params['breadcrumbs'][] = ['label' => 'Warehouse Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="warehouse-material-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelWareHouse' => $modelWareHouse,
        'modelPUnit' => $modelPUnit,
        'modelGroupFood' => $modelGroupFood,
    ]) ?>

</div>
