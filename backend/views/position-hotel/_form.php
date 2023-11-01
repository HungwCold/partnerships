<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="position-hotel-form">
    <div class="panel panel-default">
        <div class="panel-body">
		    <?php $form = ActiveForm::begin(); ?>
		    <div class="row">
		    	<div class="col-lg-6">
		    		<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
		    	</div>
		    	<div class="col-lg-6">
		    		<?= $form->field($model, 'basic_pay')->textInput(['maxlength' => true]) ?>
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
