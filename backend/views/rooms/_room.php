<?php
   use yii\helpers\Html;
   use yii\helpers\HtmlPurifier;
   use app\models\Orders;
   $order = Orders::getRoomId($model->id);

?>

<?php if (isset($order)) { ?>
    <div class="col-lg-3 col-md-6">
        <div class="panel <?= $model->status == 2  ? "panel-green" : "panel-red"?>">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <div class="huge-title-table"><?=$model->name_room;?></div>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <?php 
                if ($model->status == 3) { ?>
               		<?= Html::a('Trả phòng', ['/orders/create', 'id' => $model->id], ['class' => "btn btn-default btn-block disabled"])?>
                <?php } else { ?>
    				<?= Html::a('Đặt Phòng', ['/orders/create', 'id' => $model->id], ['class' => "btn btn-default btn-block "])?>
                <?php } ?>
                
                <?= Html::a('Xem Chi tiết', ['orders/view', 'id' => $order->increment_id], ['class' => 'btn btn-default btn-block']) ?>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="col-lg-3 col-md-6">
        <div class="panel <?= $model->status == 2  ? "panel-green" : "panel-red"?>">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <div class="huge-title-table"><?=$model->name_room;?></div>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <?php 
                if ($model->status == 3) { ?>
                    <?= Html::a('Trả phòng', ['/orders/create', 'id' => $model->id], ['class' => "btn btn-default btn-block disabled"])?>
                <?php } else { ?>
                    <?= Html::a('Đặt Phòng', ['/orders/create', 'id' => $model->id], ['class' => "btn btn-default btn-block "])?>
                <?php } ?>
                
                <?= Html::a('Xem Chi tiết', ['view', 'id' => $model->id], ['class' => 'btn btn-default btn-block']) ?>
            </div>
        </div>
    </div>
<?php } ?>