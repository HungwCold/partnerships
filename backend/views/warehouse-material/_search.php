<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WarehouseMaterialSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="warehouse-material-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'warehouse_id') ?>

    <?= $form->field($model, 'group_food_id') ?>

    <?= $form->field($model, 'product_unit_id') ?>

    <?= $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'price_import') ?>

    <?php // echo $form->field($model, 'price_export') ?>

    <?php // echo $form->field($model, 'stock') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
