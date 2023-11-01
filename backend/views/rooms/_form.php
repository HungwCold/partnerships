<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Rooms */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rooms-form">
    <div class="panel panel-default">
        <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name_room')->textInput(['maxlength' => true]) ?>
            <div class="row">
                <div class="col-lg-6">
                     <?= $form->field($model, 'price_room')->textInput() ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'price_sale')->textInput() ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <?= $form->field($model, 'status')->dropDownList(
                            ArrayHelper::map($dataStatus, 'id', 'status'),
                            [
                                'options' => [ 
                                    1 => ['Selected'=>'selected'],
                                ],
                            ]
                        ); 
                    ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'type')->dropDownList(
                            ArrayHelper::map($dataType, 'id', 'name'),
                            [
                                'options' => [ 
                                    1 => ['Selected'=>'selected'],
                                ],
                            ]
                        ); 
                    ?>
                </div>
            </div>
            
            <div class="form-group">
                <?= Html::submitButton('<i class="fa fa-floppy-o"></i> Save', ['class' => 'btn btn-success']) ?>
                <?= \yii\helpers\Html::a('<i class="fa fa-arrow-left"></i> Back', Yii::$app->request->referrer, ['class' => 'btn btn-default']); ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
