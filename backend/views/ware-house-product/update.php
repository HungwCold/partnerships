<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WareHouseProduct */

$this->title = 'Update Ware House Product: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Ware House Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ware-house-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
