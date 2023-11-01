<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Moneys */

$this->title = 'Create Moneys';
$this->params['breadcrumbs'][] = ['label' => 'Moneys', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="moneys-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
