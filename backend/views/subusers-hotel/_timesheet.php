<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Timesheet */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(['id' => 'add-event']); ?>
    <div class="modal-body">
        <?= $form->field($model, 'employee_id')->hiddenInput()->label(false); ?>

        <?= $form->field($model, 'date')->textInput(['readonly'=> 'true']) ?>

        <div class="row">
            <div class="col-lg-6">
                <?= $form->field($model, 'time_from')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-lg-6">
                <?= $form->field($model, 'time_to')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'date_submitted')->hiddenInput()->label(false); ?>

    </div>
    
    <div class="modal-footer">
        <?= Html::submitButton('<i class="fa fa-floppy-o"></i> Save', ['class' => 'btn btn-success']) ?>
        <?= Html::submitButton('Close', ['class' => 'btn btn-primary', 'data-dismiss' => 'modal']) ?>
    </div>
<?php ActiveForm::end(); ?>
