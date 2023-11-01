<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\helpers\ArrayHelper;
$this->title = 'Dashboard';
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= Html::encode($this->title) ?></h1>
    </div>
</div>
<div class="row">
	<div class="col-lg-3 col-md-6">
		<?= $this->render('totalsday/index', [
	    ]) ?>
	</div>
	<div class="col-lg-3 col-md-6">
		<?= $this->render('totalsweek/index', [
	    ]) ?>
	</div>
	<div class="col-lg-3 col-md-6">
		<?= $this->render('totalsmonth/index', [
	    ]) ?>
	</div>
	<div class="col-lg-3 col-md-6">
		<?= $this->render('totals-warehouse/index', [
	    ]) ?>
	</div>
</div>
<p>
	<?= Html::a('<i class="fa fa-file-o"></i> Thêm hóa đơn bán lẻ', ['create'], ['class' => 'btn btn-success']) ?>
	<?= Html::a('<i class="fa fa-plus"></i> Thêm Phòng', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<p>
<?php foreach ($dataProviderStatus as $key => $value) { 
		if ($value['id'] == 1) { ?>
			<?= Html::a("<i class='fa fa-tags'></i> ". $value['status'], ['index'], ['class' => $value['class']]) ?>
		<?php } else { ?>
			<?= Html::a("<i class='fa fa-tags'></i> ".$value['status'], ['index?RoomSearch%5Bstatus%5D', 'id' => $value['id']], ['class' => $value['class']]) ?>
		<?php } ?>
<?php } ?>
</p>

<div class="row">
	<div class="col-lg-8">
	<?= ListView::widget([
		  'dataProvider' => $dataProvider,
		  'itemView' => '_room',
		  'summary'=> ''
	   ]);
	?>
	</div>
	<div class="col-lg-4">
		<?= $this->render('report/index', [
	    ]) ?>
	</div>
</div
