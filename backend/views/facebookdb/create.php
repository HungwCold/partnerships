<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Facebookdb */

$this->title = 'Create Facebookdb';
$this->params['breadcrumbs'][] = ['label' => 'Facebookdbs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="facebookdb-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelType' => $modelType,
    ]) ?>

</div>
