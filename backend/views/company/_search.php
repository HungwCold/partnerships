<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CompanySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-search">
    <div class="panel panel-default">
        <div class="panel-body">
            <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
            ]); ?>
            <div class="row">
                <div class="col-lg-6">
                    <?= $form->field($model, 'name') ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'tax_code') ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <?= $form->field($model, 'email') ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'phone') ?>
                </div>
            </div>

            <?= $form->field($model, 'address') ?>

            <div class="form-group">
                <?= Html::submitButton('<i class="fa fa-search"></i> Search', ['class' => 'btn btn-primary']) ?>
                <?= Html::resetButton('<i class="fa fa-refresh"></i> Reset', ['class' => 'btn btn-outline-secondary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
