<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

?>
<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/datepicker.css" rel="stylesheet">
<div class="panel panel-default">
    <div class="panel-body">
        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
        ]); ?>
        <div class="row">
            <div class="col-lg-3">
                <label>Từ ngày</label>
                <?= $form->field($model, 'created_at', [
                    'template' => "{input}\n<span class='input-group-addon'><i class='fa fa-calendar'></i></span>\n{hint}\n{error}", 
                    'options' => [
                        'class' => 'form-group input-group ',
                    ],

                ])->textInput([
                    'class' => 'form-control startday',
                ])->label(false); ?>

                <label>Đến ngày</label>
                <?= $form->field($model, 'updated_at', [
                    'template' => "{input}\n<span class='input-group-addon'><i class='fa fa-calendar'></i></span>\n{hint}\n{error}",  
                    'options' => [
                        'class' => 'form-group input-group '
                    ],

                ])->textInput([
                    'class' => 'form-control endday',
                ])->label(false); ?>
            </div>
            <div class="col-lg-3">
                <?= $form->field($model, 'subusers_id')->dropDownList(
                        ArrayHelper::map($modelSubusersHotel, 'id', 'username'),
                        [
                            'options' => [ 
                                0 => ['Selected'=>'selected'],
                            ],
                        ]
                    ); 
                ?>
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
             <div class="col-lg-3">
                <?= $form->field($model, 'money_fund_id')->dropDownList(
                        ArrayHelper::map($modelMoney, 'id', 'name'),
                        [
                            'options' => [ 
                                0 => ['Selected' => 'selected'],
                            ],
                        ]
                    ); 
                ?>
                <?= $form->field($model, 'supplier_id')->dropDownList(
                        ArrayHelper::map($modelSupplier, 'id', 'companyName'),
                        [
                            'options' => [ 
                                0 => ['Selected' => 'selected'],
                            ],
                        ]
                    ); 
                ?>
            </div>
             <div class="col-lg-3">
                <?= $form->field($model, 'code_receiving') ?>

                <?= $form->field($model, 'status')->dropDownList(
                        ArrayHelper::map($modelStatus, 'id', 'name'),
                        [
                            'options' => [ 
                                0 => ['Selected' => 'selected'],
                            ],
                        ]
                    ); 
                ?>
            </div>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

