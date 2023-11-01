<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-index">

    <div class="jumbotron">
        <img src="http://localhost/advanced/backend/web/uploads/download.jpg" alt="dd" width="100%" height="200">
    </div>

    <div class="body-content">
        <div class="row">

        <?php foreach($dataProduct as $value): ?>
                <div class="col-lg-4 ">
                    <h2><?php echo $value['name']; ?></h2>
                    <img src="<?php echo Yii::$app->urlManagerBackend->baseUrl .'/'.  $value['images']; ?>" alt="<?php echo $value['description']?>" width='50'>
                    <p><?php echo $value['description']; ?></p>
                    <p><?php echo $value['price']; ?></p>
                </div>
            <?php endforeach; ?>
         </div>
    </div>
</div>
