<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\WarehouseMaterial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="warehouse-material-form">
    <div class="panel panel-default">
        <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            
            <div class="row">
                <div class="col-lg-6">
                    <?= $form->field($model, 'warehouse_id')->dropDownList(
                            ArrayHelper::map($modelWareHouse, 'id', 'name'),
                            [
                                'options' => [ 
                                    0 => ['Selected'=>'selected'],
                                ],
                            ]
                        ); 
                    ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'group_food_id')->dropDownList(
                            ArrayHelper::map($modelGroupFood, 'id', 'name'),
                            [
                                'options' => [ 
                                    0 => ['Selected'=>'selected'],
                                ],
                            ]
                        ); 
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <?= $form->field($model, 'product_unit_id')->dropDownList(
                            ArrayHelper::map($modelPUnit, 'id', 'name'),
                            [
                                'options' => [ 
                                    0 => ['Selected'=>'selected'],
                                ],
                            ]
                        ); 
                    ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'price_import')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <?= $form->field($model, 'price_export')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-6">
                     <?= $form->field($model, 'stock')->textInput() ?>
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
