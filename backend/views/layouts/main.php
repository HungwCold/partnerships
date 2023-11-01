<?php

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
function checkActiveClass($url, $name)
{
    if (Yii::$app->request->url == $url) {
        return Html::a($name, ["$url"], ['class' => 'active']);
    } else {
        return Html::a($name, ["$url"]);
    }
}
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo Yii::$app->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Yii::$app->request->baseUrl; ?>/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="<?php echo Yii::$app->request->baseUrl; ?>/css/plugins/timeline.css" rel="stylesheet">
    <link href="<?php echo Yii::$app->request->baseUrl; ?>/css/sb-admin-2.css" rel="stylesheet">
    <link href="<?php echo Yii::$app->request->baseUrl; ?>/css/plugins/morris.css" rel="stylesheet">
    <link href="<?php echo Yii::$app->request->baseUrl; ?>/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo Yii::$app->request->baseUrl; ?>/rooms"> <i class="fa fa-home"></i> Hotels management</a>
            </div>

            <?= $this->render('_header_menu'); ?>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <?= $this->render('_nav_menu'); ?>
                </div>
            </div>
        </nav>
        <div id="page-wrapper">
            <?= $content ?>
        </div>
    </div>
    <script src="<?= Yii::$app->request->baseUrl; ?>/js/jquery-1.11.0.js"></script>
    <script src="<?= Yii::$app->request->baseUrl; ?>/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
    <script src="<?= Yii::$app->request->baseUrl; ?>/js/plugins/metisMenu/metisMenu.min.js"></script>
    <script src="<?= Yii::$app->request->baseUrl; ?>/js/sb-admin-2.js"></script>
    <script src="<?= Yii::$app->request->baseUrl; ?>/js/moment.js"></script>
    <script src="<?= Yii::$app->request->baseUrl; ?>/js/fullcalendar.min.js"></script>
    <script src="<?= Yii::$app->request->baseUrl; ?>/js/datepicker.js"></script>
    <script src="<?= Yii::$app->request->baseUrl; ?>/js/calendar.js"></script>
    
</body>

</html>
<?php $this->endPage() ?>
