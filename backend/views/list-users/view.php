<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ListUsers */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'List Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="list-users-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'firstName',
            'lastName',
            'username',
            'sex',
            'email:email',
            'birthday',
            'password',
            'id_user_type',
            'list_users_hotel:ntext',
            'address',
            'country',
            'city',
            'bank_account_number',
            'passport',
            'passport_date',
            'passport_place',
            'noted',
            'status',
            'status_confirmed',
            'phone_number',
            'role_id',
            'bonus_point',
            'social_id',
            'token_device:ntext',
            'system',
            'facebook_token:ntext',
            'google_token:ntext',
            'setting_notification',
            'remember_token:ntext',
            'created_at',
            'updated_at',
            'last_login',
        ],
    ]) ?>

</div>
