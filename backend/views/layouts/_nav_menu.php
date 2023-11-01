<ul class="nav" id="side-menu">
    <li class="sidebar-search">
        <div class="input-group custom-search-form">
            <input type="text" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
    </li>
    <li>
        <a class="active" href="
            <?php echo Yii::$app->request->baseUrl; ?>/rooms">
            <i class="fa fa-h-square" ></i> Rooms
        </a>
    </li>
   
    <li>
        <a href="#">
            <i class="fa fa-female"></i> Lễ tân
            <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level">
            <li>
                <?= checkActiveClass('/rooms/list', 'Hiện trạng phòng'); ?>
            </li>
            <li>
                <?= checkActiveClass('/categories', 'Danh sách khách tách đoàn'); ?>
            </li>
            <li>
                <?= checkActiveClass('/categories', 'Danh sách khách chuyển phòng'); ?>
            </li>
            <li>
                <?= checkActiveClass('/categories', 'Danh sách khách ra ngoài'); ?>
            </li>
        </ul>
    </li>
    <li>
        <a href="#">
            <i class="fa fa-user"></i> Khách lẻ
            <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level">
            <li>
                <?= checkActiveClass('/orders/new-orders', 'Danh sách đặt trước'); ?>
            </li>
            <li>
                <?= checkActiveClass('/orders/received-orders', 'Danh sách nhận phòng'); ?>
            </li>
            <li>
                <?= checkActiveClass('/orders/un-received-orders', 'Danh sách không đến'); ?>
            </li>
            <li>
                <?= checkActiveClass('/orders/out-of-date-orders', 'Danh sách quá hạn'); ?>
            </li>
        </ul>
    </li>
    <li>
        <a href="#">
            <i class="fa fa-users"></i> Khách Đoàn
            <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level">
            <li>
                <a href="
                    <?php echo Yii::$app->request->baseUrl; ?>/products">Danh sách đặt trước
                </a>
            </li>
            <li>
                <a href="
                    <?php echo Yii::$app->request->baseUrl; ?>/categories">Danh sách nhận phòng
                </a>
            </li>
            <li>
                <a href="
                    <?php echo Yii::$app->request->baseUrl; ?>/categories">Danh sách không đến
                </a>
            </li>
            <li>
                <a href="
                    <?php echo Yii::$app->request->baseUrl; ?>/categories">Danh sách quá hạng
                </a>
            </li>
            <li>
                <a href="
                    <?php echo Yii::$app->request->baseUrl; ?>/categories">Danh sách trả phòng
                </a>
            </li>
        </ul>
    </li>
    <li>
        <a class="active" href="<?php echo Yii::$app->request->baseUrl; ?>/services">
            <i class="fa fa-tags" ></i> Dịch vụ
        </a>
    </li>
    <li>
        <a href="#">
            <i class="fa fa-clipboard"></i> Hóa đơn
            <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level">
            <li>
                <a href="
                    <?php echo Yii::$app->request->baseUrl; ?>/orders">Hóa đơn phòng
                </a>
            </li>
            <li>
                <a href="
                    <?php echo Yii::$app->request->baseUrl; ?>/categories">Hóa đơn bán lẻ
                </a>
            </li>
        </ul>
    </li>
    <li>
        <a href="#">
            <i class="fa fa-credit-card"></i> Thu Chi
            <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level">
            <li>
                <a href="
                    <?php echo Yii::$app->request->baseUrl; ?>/products">Phiếu thu
                </a>
            </li>
            <li>
                <a href="
                    <?php echo Yii::$app->request->baseUrl; ?>/categories">Phiếu chi
                </a>
            </li>
            <li>
                <a href="
                    <?php echo Yii::$app->request->baseUrl; ?>/categories">Phiếu ghi công nợ
                </a>
            </li>
            <li>
                <a href="
                    <?php echo Yii::$app->request->baseUrl; ?>/categories">Công nợ
                </a>
            </li>
            <li>
                <a href="
                    <?php echo Yii::$app->request->baseUrl; ?>/categories">Quỹ
                </a>
            </li>
        </ul>
    </li>
    <li>
        <a href="#">
            <i class="fa fa-archive"></i> Quản lý kho
            <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level">
            <li>
                <?= checkActiveClass('/ware-house', 'Kho hàng');?>
            </li>
            <li>
                <?= checkActiveClass('/ware-house-product', 'Sản phẩm trong kho');?>
            </li>
            <li>
                <?= checkActiveClass('/warehouse-material', 'Nguyên liệu trong kho');?>
            </li>
            <li>
                <?= checkActiveClass('/inventory-receivings', 'Phiếu nhập hàng');?>
            </li>
            <li>
                <a href="
                    <?php echo Yii::$app->request->baseUrl; ?>/categories">Phiếu xuất hàng
                </a>
            </li>
            <li>
                <a href="
                    <?php echo Yii::$app->request->baseUrl; ?>/categories">Phiếu nhập nguyên liệu
                </a>
            </li>
            <li>
                <a href="
                    <?php echo Yii::$app->request->baseUrl; ?>/categories">Phiếu nhập xuất liệu
                </a>
            </li>
            <li>
                <?= checkActiveClass('/supplier', 'Danh sách nhà cung cấp');?>
            </li>
        </ul>
    </li>
     <li >
        <a href="#">
            <i class="fa fa-sitemap"></i> Sơ đồ phòng
            <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level">
            <li>
                <?= checkActiveClass('/address/create', 'Thêm mới khách sạn');?>
            </li>
            <li>
                <?= checkActiveClass('/address', 'Danh sách khách sạn'); ?>
            </li>
            <li>
                <?= checkActiveClass('/building', 'Tòa nhà'); ?>
            </li>
            <li>
                <?= checkActiveClass('/floors', 'Tầng (lầu)'); ?>
            </li>
            <li>
                <?= checkActiveClass('/rooms/list', 'Phòng'); ?>
            </li>
            <li>
                <?= checkActiveClass('/type', 'Loại Phòng'); ?>
            </li>
            <li>
                <?= checkActiveClass('/categories', 'Giá theo thời điểm'); ?>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#">
            <i class="fa fa-wrench"></i> Quản lý thiết bị
            <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level">
            <li>
                <a href="
                    <?php echo Yii::$app->request->baseUrl; ?>/products">Tạo thiết bị
                </a>
            </li>
            <li>
                <a href="
                    <?php echo Yii::$app->request->baseUrl; ?>/products">Danh sách thiết bị
                </a>
            </li>
            <li>
                <a href="
                    <?php echo Yii::$app->request->baseUrl; ?>/products">Danh sách thiết bị bảo trì
                </a>
            </li>
            <li>
                <a href="
                    <?php echo Yii::$app->request->baseUrl; ?>/products">Danh sách thiết bị thay thế
                </a>
            </li>
        </ul>
    </li>
    <li>
        <a href="#">
            <i class="fa fa-recycle"></i> Buồn Phòng
            <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level">
            <li>
                <a href="
                    <?php echo Yii::$app->request->baseUrl; ?>/products">Lịch sử dọn phòng
                </a>
            </li>
            <li>
                <a href="
                    <?php echo Yii::$app->request->baseUrl; ?>/categories">Lịch sửa phòng
                </a>
            </li>
        </ul>
    </li>
    <li>
        <a href="#">
            <i class="fa fa-user"></i> Khách hàng
            <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level">
            <li>
                <?= checkActiveClass('/list-users', 'Danh sách khách hàng');?>
            </li>
            <li>
                <?= checkActiveClass('/company', 'Đoàn / Công ty');?>
            </li>
        </ul>
    </li>
    <li style="padding: 15px 15px 15px 15px">
        <h3 class="uppercase">Tính năng</h3>
    </li>
    <li>
        <a href="#">
            <i class="fa fa-cogs"></i> Cài đặt
            <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level">
            <li>
                <?= checkActiveClass('/product-unit', 'Đơn vị tính');?>
            </li>
            <li>
                <?= checkActiveClass('/moneys', 'Loại tiền tệ');?>
            </li>
        </ul>
    </li>
    <li>
        <a href="#">
            <i class="fa fa-user"></i> Tài khoản
            <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level">
            <li>
                <?= checkActiveClass('/subusers-hotel/create', 'Thêm tài khoản'); ?>
            </li>
            <li>
                <?= checkActiveClass('/subusers-hotel', 'Quản lý tài khoản'); ?>
            </li>
            <li>
                <?= checkActiveClass('/position-hotel/create', 'Thêm nhóm tài khoản'); ?>
            </li>
            <li>
                <?= checkActiveClass('/position-hotel', 'Quản lý nhóm tài khoản'); ?>
            </li>
            <li>
                <?= checkActiveClass('/subusers-hotel/timekeeping', 'Quản lý chấm công'); ?>
            </li>
        </ul>
    </li>
    <li>
        <a href="#">
            <i class="fa fa-files-o"></i> Thống kê
            <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level">
            <li>
                <a href="
                    <?php echo Yii::$app->request->baseUrl; ?>/products">Tồn  kho sản phẩm
                </a>
            </li>
            <li>
                <a href="
                    <?php echo Yii::$app->request->baseUrl; ?>/categories">Tồn kho nguyên liệu
                </a>
            </li>
        </ul>
    </li>
    <li>
        <a href="#">
            <i class="fa fa-files-o"></i> Báo cáo
            <span class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level">
            <li>
                <a href="
                    <?php echo Yii::$app->request->baseUrl; ?>/products">Tồn  kho sản phẩm
                </a>
            </li>
            <li>
                <a href="
                    <?php echo Yii::$app->request->baseUrl; ?>/categories">Tồn kho nguyên liệu
                </a>
            </li>
        </ul>
    </li>
</ul>