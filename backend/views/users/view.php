<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="users-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->uid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->uid], [
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
            'uid',
            'first_name',
            'last_name',
            'birthday',
            'gender',
            'email:email',
            'middle_name',
            'name',
            'relationship_status',
            'work:ntext',
            'education:ntext',
            'favorite_athletes:ntext',
            'favorite_teams:ntext',
            'hometown:ntext',
            'languages:ntext',
            'location:ntext',
            'locale:ntext',
            'interested_in:ntext',
            'updated_at',
            'created_at',
            'published_timeline:datetime',
            'religion:ntext',
            'significant_other',
            'username',
            'verified',
            'likes:ntext',
        ],
    ]) ?>

</div>
