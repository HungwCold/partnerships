<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SubusersHotelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quản lý chấm công';
$this->params['breadcrumbs'][] = $this->title;

?>
<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/datepicker.css" rel="stylesheet">
<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/calendar.css" rel="stylesheet">
</br>
<div class="row">
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bell fa-fw"></i> <?= 'Thông tin nhân Viên' ?>
            </div>
            <div class="panel-body">
                <div class="list-group">
                    <a href="#" class="list-group-item">
                        <i class="fa fa-male fa-fw"></i> <?= 'Tên: '.$model->username ?>                            
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="fa fa-code fa-fw"></i> <?= 'Mã số nhân viên: '.$model->employee_code ?>                            
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="fa fa-female fa-fw"></i> <?= 'Giới tính: '. $model->getSex($model->sex)->name ?>
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="fa fa-phone fa-fw"></i> <?= 'Số điện thoại: '. $model->phone_number ?>
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="fa fa-user fa-fw"></i> <?= 'Chức vụ: '. $model->getPosition($model->position_id)->name ?>
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="fa fa-calendar fa-fw"></i> <?= 'Tổng số ngày: '.$modelTimesheet->count_days ?>                            
                        <span class="pull-right text-muted small">
                            <em>số ngày</em>
                        </span>
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="fa fa-calendar fa-fw"></i> <?= 'Tổng số giờ: '.$modelTimesheet->count_hours ?>                          
                        <span class="pull-right text-muted small">
                            <em>số giờ</em>
                        </span>
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="fa fa-calendar fa-fw"></i> <?= 'Số ngày nghỉ trong tháng: '.$modelTimesheet->count_days_off ?>                          
                        <span class="pull-right text-muted small">
                            <em>ngày</em>
                        </span>
                    </a>
                </div>  
            </div>
        </div>
        <?= Html::a('<i class="fa fa-print"></i> Xuất lương', 
            Yii::$app->request->referrer, [
                'class' => 'btn btn-default',
                'onclick'=> 'window.print();'
            ]); 
        ?>
    </div>
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="p-5">
                    <div class="card">
                        <div class="card-body p-0">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
                <!-- calendar modal -->
                <div id="modal-view-event" class="modal modal-top fade calendar-modal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h4 class="modal-title">
                                    <span class="event-icon"></span>
                                    <span class="event-title"></span>
                                </h4>
                                <div class="event-body"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="modal-view-event-add" class="modal modal-top fade calendar-modal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <?= $this->render('_timesheet', ['model' => $modelTimesheet]); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    window.data_day = <?= $data_day ?>;
</script>
