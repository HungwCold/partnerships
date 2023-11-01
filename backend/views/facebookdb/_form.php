<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

?>

<div class="facebookdb-form">
    <div class="panel panel-default">
        <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'comment')->dropDownList(
                    ArrayHelper::map($modelType, 'id', 'name'),
                    [
                        'options' => [ 
                            0 => ['Selected'=>'selected'],
                        ],
                    ]
                ); 
            ?>
            <?= $form->field($model, 'list_content')->textarea(['rows' => 10]) ?>

            <div class="form-group">
                <?= Html::submitButton('<i class="fa fa-floppy-o"></i> Save', ['class' => 'btn btn-success']) ?>
                <?= Html::a('<i class="fa fa-arrow-left"></i> Back', Yii::$app->request->referrer, ['class' => 'btn btn-default']); ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
