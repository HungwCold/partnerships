<?php  use yii\helpers\Html; ?>
 <?php   use yii\helpers\HtmlPurifier; ?>
<?php  use backend\widgets\reports\rightViewWidget;?>

<?= rightViewWidget::widget(['text' => 'Submit']) ?>

 <?php   backend\widgets\reports\rightViewWidget::begin([])?>

        asasdasdasdasasasada

 <?php   backend\widgets\reports\rightViewWidget::end()?>


<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-bell fa-fw"></i> Báo cáo trong hôm nay
    </div>

    <div class="panel-body">
        <div class="list-group">
            <a href="#" class="list-group-item">
                <i class="fa fa-files-o fa-fw"></i> Hóa đơn
                
                <span class="pull-right text-muted small">
                    <em>12 đơn</em>
                </span>
            </a>
            <a href="#" class="list-group-item">
                <i class="fa fa-sitemap fa-fw"></i> Hàng hóa
                
                <span class="pull-right text-muted small">
                    <em>50 sản phẩm</em>
                </span>
            </a>
            <a href="#" class="list-group-item">
                <i class="fa fa-table fa-fw"></i> Phòng vs Bàn
                
                <span class="pull-right text-muted small">
                    <em>18 bàn và 3 phòng</em>
                </span>
            </a>
            <a href="#" class="list-group-item">
                <i class="fa fa-users fa-fw"></i> Khách hàng
                
                <span class="pull-right text-muted small">
                    <em>205 khách</em>
                </span>
            </a>
            <a href="#" class="list-group-item">
                <i class="fa fa-users fa-fw"></i> Nhà cung cấp
                
                <span class="pull-right text-muted small">
                    <em>5 nhà cung cấp</em>
                </span>
            </a>
            <a href="#" class="list-group-item">
                <i class="fa fa-list-alt fa-fw"></i> Thực đơn
                
                <span class="pull-right text-muted small">
                    <em>95 sản phẩm đang bán</em>
                </span>
            </a>
            <a href="#" class="list-group-item">
                <i class="fa fa-database fa-fw"></i> Nhập kho
                
                <span class="pull-right text-muted small">
                    <em>Đang bận</em>
                </span>
            </a>
            <a href="#" class="list-group-item">
                <i class="fa fa-truck fa-fw"></i> Chuyển kho
                
                <span class="pull-right text-muted small">
                    <em>Chuyển sau</em>
                </span>
            </a>
            <a href="#" class="list-group-item">
                <i class="fa fa-files-o fa-fw"></i> Phiếu thu
                
                <span class="pull-right text-muted small">
                    <em>50 Phiếu</em>
                </span>
            </a>
            <a href="#" class="list-group-item">
                <i class="fa fa-files-o fa-fw"></i> Phiếu chi
                
                <span class="pull-right text-muted small">
                    <em>79 phiếu</em>
                </span>
            </a>
            <a href="#" class="list-group-item">
                <i class="fa fa-bar-chart-o fa-fw"></i> Doanh thu
                
                <span class="pull-right text-muted small">
                    <em>120.000.000đ/tháng</em>
                </span>
            </a>
            <a href="#" class="list-group-item">
                <i class="fa fa-cogs fa-fw"></i> Thiết lập
                
                <span class="pull-right text-muted small">
                    <em>7 thiệt lập</em>
                </span>
            </a>
        </div>
        <!-- <a href="#" class="btn btn-default btn-block">View All Alerts</a> -->
    </div>
</div>