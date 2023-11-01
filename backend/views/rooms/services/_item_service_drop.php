<?php 
use app\models\Menus;
use app\helpers\Helper;

if (count($dataBill) > 0) {
	foreach ($dataBill as $key => $value) {
		$count = $count + ($value['Price'] * $value['Quantity']);
	 ?>
		<div data-key="<?= $value['IdMenu']?>">
			<a href="javascript:void(0)" class="list-group-item draggable" data-price="<?= $value['Price']?>" data-quantity="<?= $value['Quantity']?>">
			    <i class="fa fa-minus-circle fa-fw"></i>  
			    <?= Menus::findOne($value['IdMenu'])->NameMenu; ?>
			    <span class="pull-right text-muted small">
			        <em><?= Helper::formatPrice($value['Price'])?></em>
			    </span>
			    <span class="count"><?= $value['Quantity']?></span>
			    <span class="remove btn-danger">
					<i class="fa fa-times"></i>
				</span>
			</a>
		</div>
<?php } ?>	
	
<?php } ?>