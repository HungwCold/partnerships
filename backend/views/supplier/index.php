<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SupplierSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách nhà cung cấp';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supplier-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fa fa-plus"></i> Tạo mới nhà cung cấp', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="panel panel-default">
        <div class="panel-body">
		    <?= GridView::widget([
		        'dataProvider' => $dataProvider,
		        'tableOptions' => [
                    'class'=>'table table-striped table-bordered table-hover'
                ],
                'layout'=> "{items}\n{summary}\n{pager}",
                'summaryOptions' => [
                    'class' => 'pull-right'
                ],
		        'columns' => [
		            ['class' => 'yii\grid\SerialColumn'],
		            [
                        'attribute' => 'companyName',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return Html::a($model->companyName, ['view', 'id' => $model->id]);
                        }
                    ],
                    [
                        'attribute' => 'contactName',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->contactName;
                        },
                        'contentOptions' => ['class' => 'visible-lg visible-md visible-sm'],
                        'headerOptions' => ['class'=>'visible-lg visible-md visible-sm'],
                    ],
                    [
                        'attribute' => 'address',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->address;
                        },
                        'contentOptions' => ['class' => 'visible-lg visible-md visible-sm'],
                        'headerOptions' => ['class'=>'visible-lg visible-md visible-sm'],
                    ],
                    [
                        'attribute' => 'phone',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->phone;
                        },
                        'contentOptions' => ['class' => 'visible-lg visible-md visible-sm'],
                        'headerOptions' => ['class'=>'visible-lg visible-md visible-sm'],
                    ],
                    [
                        'attribute' => 'fax',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->fax;
                        },
                        'contentOptions' => ['class' => 'visible-lg visible-md visible-sm'],
                        'headerOptions' => ['class'=>'visible-lg visible-md visible-sm'],
                    ],
		        ],
		    ]); ?>
		</div>
    </div>
</div>
