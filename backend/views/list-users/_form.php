<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ListUsers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="list-users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'firstName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sex')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birthday')->textInput() ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_user_type')->textInput() ?>

    <?= $form->field($model, 'list_users_hotel')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bank_account_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'passport')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'passport_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'passport_place')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'noted')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_confirmed')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'role_id')->textInput() ?>

    <?= $form->field($model, 'bonus_point')->textInput() ?>

    <?= $form->field($model, 'social_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'token_device')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'system')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'facebook_token')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'google_token')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'setting_notification')->textInput() ?>

    <?= $form->field($model, 'remember_token')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'last_login')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
