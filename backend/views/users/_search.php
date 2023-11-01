<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="users-search">
    <div class="panel panel-default">
        <div class="panel-body">
            <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
            ]); ?>
            
            <div class="row">
                <div class="col-lg-4">
                    <?= $form->field($model, 'uid') ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($model, 'name') ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($model, 'birthday') ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <?= $form->field($model, 'gender') ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($model, 'relationship_status') ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($model, 'work') ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-4">
                    <?= $form->field($model, 'education') ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($model, 'hometown') ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($model, 'languages') ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <?= $form->field($model, 'locale') ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($model, 'religion') ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($model, 'username') ?>
                </div>
            </div>

            <div class="form-group">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
