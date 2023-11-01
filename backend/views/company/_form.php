<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Company */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-form">
    <div class="panel panel-default">
        <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>
            
            <div class="row">
                <div class="col-lg-6">
                     <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-6">
                   <?= $form->field($model, 'tax_code')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <?= $form->field($model, 'bank_account_number')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                     <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <?= $form->field($model, 'noted')->textarea(['rows' => 6]) ?>

            <div class="form-group">
                <?= Html::submitButton('<i class="fa fa-floppy-o"></i> Save', ['class' => 'btn btn-success']) ?>
                <?= Html::a('<i class="fa fa-arrow-left"></i> Back', Yii::$app->request->referrer, ['class' => 'btn btn-default']); ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
