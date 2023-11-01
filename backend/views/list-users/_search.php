<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ListUsersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="list-users-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'firstName') ?>

    <?= $form->field($model, 'lastName') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'birthday') ?>

    <?php // echo $form->field($model, 'password') ?>

    <?php // echo $form->field($model, 'id_user_type') ?>

    <?php // echo $form->field($model, 'list_users_hotel') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'country') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'bank_account_number') ?>

    <?php // echo $form->field($model, 'passport') ?>

    <?php // echo $form->field($model, 'passport_date') ?>

    <?php // echo $form->field($model, 'passport_place') ?>

    <?php // echo $form->field($model, 'noted') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'status_confirmed') ?>

    <?php // echo $form->field($model, 'phone_number') ?>

    <?php // echo $form->field($model, 'role_id') ?>

    <?php // echo $form->field($model, 'bonus_point') ?>

    <?php // echo $form->field($model, 'social_id') ?>

    <?php // echo $form->field($model, 'token_device') ?>

    <?php // echo $form->field($model, 'system') ?>

    <?php // echo $form->field($model, 'facebook_token') ?>

    <?php // echo $form->field($model, 'google_token') ?>

    <?php // echo $form->field($model, 'setting_notification') ?>

    <?php // echo $form->field($model, 'remember_token') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'last_login') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
