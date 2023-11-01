<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\SubusersHotelSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subusers-hotel-search">
    <div class="panel panel-default">
        <div class="panel-body">
            <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
            ]); ?>

            <div class="row">
                <div class="col-lg-6">
                   <?= $form->field($model, 'username') ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'sex')->dropDownList(
                            ArrayHelper::map($dataSex, 'id', 'name'),
                            [
                                'options' => [ 
                                    1 => ['Selected'=>'selected'],
                                ],
                            ]
                        ); 
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <?=  $form->field($model, 'phone_number') ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'position_id')->dropDownList(
                            ArrayHelper::map($dataPosition, 'id', 'name'),
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
                <?= Html::submitButton('<i class="fa fa-search"></i> Search', ['class' => 'btn btn-primary']) ?>
                <?= Html::resetButton('<i class="fa fa-refresh"></i> Reset', ['class' => 'btn btn-outline-secondary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
