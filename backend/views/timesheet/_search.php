<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TimesheetSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="timesheet-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'employee_id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'time_from') ?>

    <?= $form->field($model, 'time_to') ?>

    <?php // echo $form->field($model, 'comment') ?>

    <?php // echo $form->field($model, 'date_submitted') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
