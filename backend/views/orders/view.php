<?php

use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\ListView;
use app\models\Rooms;

$this->title = 'Hiện trạng phòng: '. $model->id;

?>
<h1></h1>
<div class="row">
    <div class="panel <?= $model->status == 2  ? "panel-green" : "panel-default"?>">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <div class="huge-title-table">  <?= Rooms::findOne($model->room_id)->name_room; ?></div>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-list fa-fw"></i> Danh sách menu
                    </div>
                    <div class="panel-body data-product">
                        <div class="list-group">
                            <?= ListView::widget([
                                'dataProvider' => $dataServiceProvider,
                                'itemView' => 'services/_item_service',
                                'summary'=> '',
                                'options' => [
                                    'class' => 'droptrue',
                                    'id' => 'sortable1',
                                ]
                               ]);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-list fa-fw"></i> Danh sách đã order
                    </div>
                    <div class="panel-body receiving-product">
                        <div class="list-group">
                            <div id='sortable2' class="dropfalse">
                               <?= $this->render('services/_item_service_drop', ['dataBill' => $dataOrdersItems]); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="panel-body" >
                    
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-clock-o fa-fw"></i> Lịch Sử Phòng
        </div>
        <div class="panel-body">
            <ul class="timeline">
                <?php foreach ($modelHistory as $key => $value) { 
                        if ($key % 2 == 0) { ?>
                            <li>
                                <div class="timeline-badge success"><i class="fa fa-comments-o"></i>
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title"><?= $value['status'] ?></h4>
                                        <p>
                                            <small class="text-muted"><i class="fa fa-clock-o"></i> 
                                                <?=  $value['created_at'] ?>
                                            </small>
                                        </p>
                                    </div>
                                    <div class="timeline-body">
                                        <p><?=  $value['content'] ?></p>
                                    </div>
                                </div>
                            </li>
                <?php  } else { ?>
                        <li class="timeline-inverted">
                            <div class="timeline-badge warning"><i class="fa fa-comments-o"></i>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title"><?= $value['status'] ?></h4>
                                </div>
                                <div class="timeline-body">
                                    <p><?=  $value['content'] ?></p>
                                    <p>
                                        <small class="text-muted"><i class="fa fa-clock-o"></i> 
                                            <?=  $value['created_at'] ?>
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                <?php }  ?>
            </ul>
        </div>
    </div>id
</div>
 <input type="hidden" id='increment_id' name="increment_id" value="<?= $model->increment_id ?>" />