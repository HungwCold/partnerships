<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
$listStatus = [
    '0' => [
        'id' => 0,
        'name' => ' Mặc định'
    ],
    '1' => [
        'id' => 1,
        'name' => 'None'
    ],
];
?>

<div class="moneys-form">
    <div class="panel panel-default">
        <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>
                <div class="row">
                    <div class="col-lg-6">
                       <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-lg-6">
                        <?= $form->field($model, 'status')->dropDownList(
                                ArrayHelper::map($listStatus, 'id', 'name'),
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
                       <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-lg-6">
                        <?= $form->field($model, 'scale')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>     

                <div class="form-group">
                    <?= Html::submitButton('<i class="fa fa-floppy-o"></i> Save', ['class' => 'btn btn-success']) ?>
                    <?= Html::a('<i class="fa fa-arrow-left"></i> Back', Yii::$app->request->referrer, ['class' => 'btn btn-default']); ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
