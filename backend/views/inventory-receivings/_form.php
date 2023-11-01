<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InventoryReceivings */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inventory-receivings-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hotel_id')->textInput() ?>

    <?= $form->field($model, 'warehouse_id')->textInput() ?>

    <?= $form->field($model, 'supplier_id')->textInput() ?>

    <?= $form->field($model, 'money_fund_id')->textInput() ?>

    <?= $form->field($model, 'subusers_id')->textInput() ?>

    <?= $form->field($model, 'code_receiving')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_money')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'discount')->textInput() ?>

    <?= $form->field($model, 'value_added_tax')->textInput() ?>

    <?= $form->field($model, 'final_settlement')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'has_paid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'products')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
