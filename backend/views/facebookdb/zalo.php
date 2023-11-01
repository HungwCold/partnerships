<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

?>
<h1>Gửi SMS to Zalo</h1>
<div class="facebookdb-form">
    <div class="panel panel-default">
        <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>

            <label>Access token Zalo</label>

            <?= 
                Html::input('text', 'access_token', null, ['class'=>'form-control']);
            ?>
            </br>
            <label>Nội Dung</label>
            <?= 
                Html::textarea('message', null, ['class'=>'form-control']);
            ?>
            <hr>

            <div class="form-group">
                <?= Html::submitButton('<i class="fa fa-floppy-o"></i> Save', ['class' => 'btn btn-success']) ?>
                <?= Html::a('<i class="fa fa-arrow-left"></i> Back', Yii::$app->request->referrer, ['class' => 'btn btn-default']); ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>