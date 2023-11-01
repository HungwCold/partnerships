<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'uid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birthday')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'middle_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'relationship_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'work')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'education')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'favorite_athletes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'favorite_teams')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'hometown')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'languages')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'location')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'locale')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'interested_in')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'published_timeline')->textInput() ?>

    <?= $form->field($model, 'religion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'significant_other')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'verified')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'likes')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
