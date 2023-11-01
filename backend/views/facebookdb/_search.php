<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


?>

<div class="facebookdb-search">
    <div class="panel panel-default">
        <div class="panel-body">
            <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
            ]); ?>

            <div class="row">
                <div class="col-lg-6">
                    <?= $form->field($model, 'uid') ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'name') ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-6">
                    <?= $form->field($model, 'phone') ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'comment')->dropDownList(
                            ArrayHelper::map($modelType, 'id', 'name'),
                            [
                                'options' => [ 
                                    0 => ['Selected'=>'selected'],
                                ],
                            ]
                        ); 
                    ?>
                </div>
            </div>
            

            <div class="form-group">
                <?= Html::submitButton('<i class="fa fa-search"></i> Search', ['class' => 'btn btn-primary']) ?>

                <?= Html::resetButton('<i class="fa fa-refresh"></i> Reset', ['class' => 'btn btn-outline-secondary']) ?>

                <?= Html::a('<i class="fa fa-download"></i> Export CSV Contact', 
                    ['/facebookdb/'.str_replace(["/facebookdb/index", '/facebookdb'],"contact", Yii::$app->request->url)],  
                    [
                        'class' => 'btn btn-outline-secondary',
                        'target' => '_blank'
                    ]) 
                ?>

                <?= Html::a('<i class="fa fa-download"></i> Export CSV Phone', 
                    ['/facebookdb/'.str_replace(["/facebookdb/index", '/facebookdb'],"phone", Yii::$app->request->url)], 
                    [
                        'class' => 'btn btn-outline-secondary',
                        'target' => '_blank'
                    ]) 
                ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
