<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="product-unit-form">
	 <div class="panel panel-default">
        <div class="panel-body">
		    <?php $form = ActiveForm::begin(); ?>

		    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

		     <div class="form-group">
		        <?= Html::submitButton('<i class="fa fa-floppy-o"></i> Save', ['class' => 'btn btn-success']) ?>
		        <?= Html::a('<i class="fa fa-arrow-left"></i> Back', Yii::$app->request->referrer, ['class' => 'btn btn-default']); ?>
		    </div>

		    <?php ActiveForm::end(); ?>
    	</div>
    </div>
</div>
