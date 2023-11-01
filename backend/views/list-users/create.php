<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ListUsers */

$this->title = 'Create List Users';
$this->params['breadcrumbs'][] = ['label' => 'List Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="list-users-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
