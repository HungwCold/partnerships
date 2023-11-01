<?php 
use app\models\Services;
function formatPrice($priceFloat) {
    $symbol = 'đ';
    $symbol_thousand = '.';
    $decimal_place = 0;
    $price = number_format($priceFloat, $decimal_place, '', $symbol_thousand);
    return $price.$symbol;
}
$count = 0;
if (count($dataBill) > 0) {
	foreach ($dataBill as $key => $value) {
		$count = $count + ($value['price'] * $value['quantity']);
	 ?>
		<div data-key="<?= $value['id_service']?>">
			<a href="javascript:void(0)" class="list-group-item draggable" data-price="<?= $value['price']?>" data-quantity="<?= $value['quantity']?>">
			    <i class="fa fa-minus-circle fa-fw"></i>  
			    <?= Services::findOne($value['id_service'])->name; ?>
			    <span class="pull-right text-muted small">
			        <em><?= formatPrice($value['price']) ?></em>
			    </span>
			    <span class="count"><?= $value['quantity']?></span>
			    <span class="remove btn-danger">
					<i class="fa fa-times"></i>
				</span>
			</a>
		</div>
<?php } ?>	
	
<?php } ?>