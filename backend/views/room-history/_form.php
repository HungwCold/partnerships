<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
$statusList = [
    [
        "id" => 1,
        "status" => "Ra ngoài",
    ],
    [
        "id" => 2,
        "status" => "Chuyển Phòng",
    ],
    [
        "id" => 3,
        "status" => "Vào Phòng",
    ],
    [
        "id" => 4,
        "status" => "Other...",
    ]
];
?>

<div class="room-history-form">
    <div class="panel panel-default">
        <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'room_id')->hiddenInput(['value'=> $_GET['id']])->label(false); ?>

            <?= $form->field($model, 'status')->dropDownList(
                    ArrayHelper::map($statusList, 'id', 'status'),
                    [
                        'options' => [ 
                            1 => ['Selected'=>'selected'],
                        ],
                    ]
                ); 
            ?>

            <?= $form->field($model, 'content')->textarea(['rows' => 6, 'placeholder' => 'Comment...']) ?>

            <div class="form-group">
                <?= Html::submitButton('<i class="fa fa-floppy-o"></i> Save', ['class' => 'btn btn-success']) ?>
                <?= Html::a('<i class="fa fa-arrow-left"></i> Back', Yii::$app->request->referrer, ['class' => 'btn btn-default']); ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
