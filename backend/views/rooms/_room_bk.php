<?php
   use yii\helpers\Html;
   use yii\helpers\HtmlPurifier;
?>
<div class="col-lg-3 col-md-6">
    <div class="panel <?= $model->status == 2  ? "panel-green" : "panel-red"?>">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <div class="huge"><?=$model->name_room;?></div>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="list-group">
                <a href="#" class="list-group-item">
                    <i class="fa fa-money"></i> Giá phòng: <?= Yii::$app->formatter->asDecimal($model->price_room);?> vnđ
                </a>

                <a href="#" class="list-group-item">
                    <i class="fa fa-money"></i> Giá sale Apply cho VIP: <?= Yii::$app->formatter->asDecimal($model->price_sale);?> vnđ
                </a>
            </div>
            <?php if ($model->status == 3) { ?>
           		<?= Html::a('Đặt Phòng', ['/orders/create', 'id' => $model->id], ['class' => "btn btn-default btn-block disabled"])?>
            <?php } else { ?>
				<?= Html::a('Đặt Phòng', ['/orders/create', 'id' => $model->id], ['class' => "btn btn-default btn-block "])?>
            <?php } ?>
            
            <?= Html::a('Xem Chi tiết', ['view', 'id' => $model->id], ['class' => 'btn btn-default btn-block']) ?>
        </div>
    </div>
</div>