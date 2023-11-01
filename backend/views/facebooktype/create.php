<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Facebooktype */

$this->title = 'Create Facebooktype';
$this->params['breadcrumbs'][] = ['label' => 'Facebooktypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="facebooktype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
