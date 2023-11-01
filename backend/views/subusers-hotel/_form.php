<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

?>
<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/datepicker.css" rel="stylesheet">
<div class="subusers-hotel-form">
    <div class="panel panel-default">
        <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <div class="col-lg-6">
                   <?= $form->field($model, 'employee_code')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                   <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <div class="row">
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
                <div class="col-lg-6">
                    <label>Ngày sinh</label>
                    <?= $form->field($model, 'birthday', [
                        'template' => "{input}\n<span class='input-group-addon'><i class='fa fa-calendar'></i></span>\n{hint}\n{error}",  
                        'options' => [
                            'class' => 'form-group input-group '
                        ],

                    ])->textInput([
                        'class' => 'form-control',
                    ])->label(false); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>
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
                <?= Html::submitButton('<i class="fa fa-floppy-o"></i> Save', ['class' => 'btn btn-success']) ?>
                <?= Html::a('<i class="fa fa-arrow-left"></i> Back', Yii::$app->request->referrer, ['class' => 'btn btn-default']); ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
