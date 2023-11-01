<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ListUsers */

$this->title = 'Update List Users: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'List Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="list-users-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
