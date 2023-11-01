<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WareHouse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ware-house-form">
    <div class="panel panel-default">
        <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <div class="col-lg-6">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'manager')->textInput(['maxlength' => true]) ?>
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
            
            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'noted')->textarea(['rows' => 6]) ?>

            <div class="form-group">
                <?= Html::submitButton('<i class="fa fa-floppy-o"></i> Save', ['class' => 'btn btn-success']) ?>
                <?= \yii\helpers\Html::a('<i class="fa fa-arrow-left"></i> Back', Yii::$app->request->referrer, ['class' => 'btn btn-default']); ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
