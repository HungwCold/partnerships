<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
$data_city = JSON::decode(file_get_contents(Yii::getAlias('@webroot').'/data_location/tinh_tp.json'));
$data_district = JSON::decode(file_get_contents(Yii::getAlias('@webroot').'/data_location/quan_huyen.json'));   
$data_ward = JSON::decode(file_get_contents(Yii::getAlias('@webroot').'/data_location/xa_phuong.json'));

?>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="address-form">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name_hotel')->textInput(['maxlength' => true]) ?>
            <div class="row">
                <div class="col-lg-6">
                    <?= $form->field($model, 'tel_hotel')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'city')->dropDownList(
                            ArrayHelper::map($data_city, 'code', 'name'),
                            [
                                'options' => [ 
                                    79 => ['Selected'=>'selected'],
                                ],
                                'onchange' => 'LoadDistrict(this.value)',
                            ]
                        ); 
                    ?>
                </div>   
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <?= $form->field($model, 'district')->dropDownList(
                            ArrayHelper::map(array_filter($data_district, function($val){
                                return $val["parent_code"]=='79';
                             }), 'code', 'name'),
                            [
                                'options' => [
                                    760 => ['Selected'=>'selected']
                                ],
                                'onchange' => 'LoadWard(this.value)',
                            ]
                        ); 
                    ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'ward')->dropDownList(
                            ArrayHelper::map(array_filter($data_ward, function($val){
                                return $val["parent_code"]=='760';
                             }), 'code', 'name'),
                            [
                                'options' => [ 26734 => ['Selected'=>'selected']]
                            ]
                        );  
                    ?>
                </div>
            </div>   

            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('<i class="fa fa-floppy-o"></i> Save', ['class' => 'btn btn-success']) ?>
                <?= Html::a('<i class="fa fa-arrow-left"></i> Back', Yii::$app->request->referrer, ['class' => 'btn btn-default']); ?>
            </div>

            

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<script type="text/javascript">

    var district = <?= file_get_contents(Yii::getAlias('@webroot').'/data_location/quan_huyen.json'); ?>;
    var ward = <?= file_get_contents(Yii::getAlias('@webroot').'/data_location/xa_phuong.json'); ?>;
    
    function LoadDistrict(val) {
        var listDistrict = Object.values(district).filter((item)=>  item.parent_code === val);
        listDistrict.sort(function(a, b) {
            if (a.name > b.name) {
                return 1;
            }
            if (b.name > a.name) {
                return -1;
            }
            return 0;
        });
        var districtElement = $('#address-district');
        districtElement.html("");
        listDistrict.map((item)=> {
            districtElement.append(`<option value='${item.code}'>${item.name}</option>`);
        });
        LoadWard(listDistrict[0].code);
    }

    function LoadWard(val) {
        var listWard = Object.values(ward).filter((item)=>  item.parent_code === val);
        listWard.sort();
        var wardElement = $('#address-ward');
        wardElement.html("");
        listWard.map((item)=>{
            wardElement.append(`<option value='${item.code}'>${item.name}</option>`);
        })
    }
    
    
    
</script>


