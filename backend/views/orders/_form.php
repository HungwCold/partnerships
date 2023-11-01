<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\StatusRoom;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>
<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/datepicker.css" rel="stylesheet">
<div class="orders-form">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="address-form">
                <?php $form = ActiveForm::begin(); ?>
                <div class="row">
                    <div class="col-lg-6">
                        <?= $form->field($model, 'user_name')->textInput() ?>
                    </div>
                    <div class="col-lg-6">
                        <?= $form->field($model, 'room_id')->textInput([
                            'readonly' => true, 
                            'value' => (isset($model->room_id) ? $model->room_id : $_GET['id'])
                        ]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <?= $form->field($model, 'total_price', [
                            'inputOptions' => [
                                'value' => $model->total_price,
                                'class' => 'form-control'
                            ]
                        ])->textInput() ?>
                    </div>
                    <div class="col-lg-6">
                        <?= $form->field($model, 'status')
                            ->dropDownList(
                                ArrayHelper::map(StatusRoom::find()->asArray()->all(), 'id', 'status'),
                                [
                                    'options' => [ 
                                        0 => ['Selected' => 'selected'],
                                    ],
                                ]
                            );
                        ?>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-lg-6">
                        <?= $form->field($model, 'identity_papers')
                            ->dropDownList(
                                [
                                    '1' => 'CMND', 
                                    '2' => 'CCCD',
                                    '3' => 'Visa',
                                    '4' => 'Khác'
                                ],
                                ['prompt'=>'Chọn phương thức']
                            );
                        ?>
                    </div>
                    <div class="col-lg-6">
                        <?= $form->field($model, 'identity_number')->textInput() ?>
                    </div>
                </div> 

                <div class="row">
                    <div class="col-lg-6">
                        <?= $form->field($model, 'method_payment')
                            ->dropDownList(
                                [
                                    '1' => 'Tiền mặt', 
                                    '0' => 'Chuyển Khoản'
                                ],
                                ['prompt'=>'Chọn phương thức']
                            );
                        ?>
                    </div>
                    <div class="col-lg-6">
                        <?= $form->field($model, 'status_payment')
                            ->dropDownList(
                                [
                                    '0' => 'Chưa thanh toán', 
                                    '1' => 'Đã thanh toán'
                                ],
                                ['prompt'=>'Chọn Trang thái']
                            );
                        ?>
                    </div>
                </div> 

                <div class="row">
                    <div class="col-lg-6">
                        <?= $form->field($model, 'order_number')->textInput(['maxlength' => true]) ?>
                    </div>

                    <div class="col-lg-6">
                        <label>Giờ hẹn gặp</label>
                        <?= $form->field($model, 'time_meet', [
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
                         <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-lg-6">
                       <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
               

                <div class="row">
                    <div class="col-lg-6">
                        <label>Giờ Vào</label>
                        <?= $form->field($model, 'check_in', [
                            'template' => "{input}\n<span class='input-group-addon'><i class='fa fa-calendar'></i></span>\n{hint}\n{error}",  
                            'options' => [
                                'class' => 'form-group input-group '
                            ],

                        ])->textInput([
                            'class' => 'form-control',
                        ])->label(false); ?>
                    </div>
                    <div class="col-lg-6">
                        <label>Giờ Ra</label>
                        <?= $form->field($model, 'check_out', [
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
                        <label>Ngày Vào</label>
                        <?= $form->field($model, 'created_at', [
                            'template' => "{input}\n<span class='input-group-addon'><i class='fa fa-calendar'></i></span>\n{hint}\n{error}",  
                            'options' => [
                                'class' => 'form-group input-group '
                            ],

                        ])->textInput([
                            'class' => 'form-control',
                        ])->label(false); ?>
                    </div>
                    <div class="col-lg-6">
                        <label>Ngày Trả Phòng</label>
                        <?= $form->field($model, 'updated_at', [
                            'template' => "{input}\n<span class='input-group-addon'><i class='fa fa-calendar'></i></span>\n{hint}\n{error}",  
                            'options' => [
                                'class' => 'form-group input-group '
                            ],

                        ])->textInput([
                            'class' => 'form-control',
                        ])->label(false); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Tiến hành đặt phòng', ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
