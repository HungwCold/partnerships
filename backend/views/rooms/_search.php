<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\RoomSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rooms-search">
    <div class="panel panel-default">
        <div class="panel-body">
            <?php $form = ActiveForm::begin([
                'action' => ['list'],
                'method' => 'get',
            ]); ?>
            <div class="row">
                <div class="col-lg-6">
                    <?= $form->field($model, 'status')->dropDownList(
                            ArrayHelper::map($dataStatus, 'id', 'status')
                        ); 
                    ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'type')->dropDownList(
                        ArrayHelper::map($dataType, 'id', 'name')
                    ); 
                ?>
                </div>
            </div>

            <div class="form-group">
                <?= Html::submitButton('<i class="fa fa-search"></i> Tìm kiếm', ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
