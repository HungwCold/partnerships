<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\WareHouseProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ware-house-product-search">
    <div class="panel panel-default">
        <div class="panel-body">
            <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
            ]); ?>
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
                    <?= $form->field($model, 'name') ?>
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
