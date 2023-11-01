<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
$status = [
    0 => [
        'id' => 0,
        'name' => 'Kích Hoạt'
    ],
    1 => [
        'id' => 1,
        'name' => 'Chưa Kích Hoạt'
    ],
];
?>

<div class="services-form">
    <div class="panel panel-default">
        <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <div class="col-lg-6">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </div>
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
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <?= $form->field($model, 'price_import')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'price_export')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <?= $form->field($model, 'status')->dropDownList(
                    ArrayHelper::map($status, 'id', 'name'),
                    [
                        'options' => [ 
                            0 => ['Selected'=>'selected'],
                        ],
                    ]
                ); 
            ?>

            <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

            <div class="form-group">
                <?= Html::submitButton('<i class="fa fa-floppy-o"></i> Save', ['class' => 'btn btn-success']) ?>
                <?= Html::a('<i class="fa fa-arrow-left"></i> Back', Yii::$app->request->referrer, ['class' => 'btn btn-default']); ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
