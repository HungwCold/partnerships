<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WareHouseProduct */

$this->title = 'Tạo sản phẩm';
$this->params['breadcrumbs'][] = ['label' => 'Ware House Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ware-house-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelWareHouse' => $modelWareHouse,
        'modelPUnit' => $modelPUnit,
        'modelGroupFood' => $modelGroupFood,
    ]) ?>

</div>
