<?php

namespace backend\controllers;

use Yii;
use app\models\Address;
use app\models\AddressSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\filters\AccessControl;

/**
 * AddressController implements the CRUD actions for Address model.
 */
class AddressController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create'],
                'rules' => [
                    [
                        'actions' => ['index', 'create'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST','GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all Address models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AddressSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Address model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Address model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    
    public function convert_vi_to_en($str) {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
        $str = preg_replace("/(đ)/", "d", $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
        $str = preg_replace("/(Đ)/", "D", $str);
        $str = preg_replace("/ /", "_", $str);
        return strtolower($str);
    }

    public function actionCreate()
    {
        $model = new Address();
        if (Yii::$app->request->post()) {
            $data = Yii::$app->request->post();
            $model->load($data);

            $data_city = JSON::decode(file_get_contents(Yii::getAlias('@webroot').'/data_location/tinh_tp.json'));
            $data_district = JSON::decode(file_get_contents(Yii::getAlias('@webroot').'/data_location/quan_huyen.json'));   
            $data_ward = JSON::decode(file_get_contents(Yii::getAlias('@webroot').'/data_location/xa_phuong.json'));

            $model->city=$data_city[$data["Address"]["city"]]["name"];
            $model->district=$data_district[$data["Address"]["district"]]["name"];
            $model->ward=$data_ward[$data["Address"]["ward"]]["name"];

            $model->user_id = Yii::$app->user->id;
            $model->city_search = $this->convert_vi_to_en($model->city);
            $model->district_search = $this->convert_vi_to_en($model->district);
            $model->ward_search = $this->convert_vi_to_en($model->ward);

            $address= $model->address.",".$model->ward.",".$model->district.",".$model->city;
            $geoCodingAddress = $this->geoCoding($address);
            $model->latitude = $geoCodingAddress["lat"];
            $model->longitude = $geoCodingAddress["lng"];
            $model->save();

            return $this->redirect(['index']);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }
    protected function geoCoding($address)
    {
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',

        );
        $url = 'https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&key=AIzaSyCsdMUhw6O9TO825_HszwFtbzwP2LtqR4I';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        $content = trim(curl_exec($ch));
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($httpcode === 200) {
            $respJson = JSON::decode($content);
            return ($respJson["results"][0]["geometry"]["location"]);
        }
    }

    /**
     * Updates an existing Address model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->post()) {
            $data = Yii::$app->request->post();
            $model->load($data);

            $data_city = JSON::decode(file_get_contents(Yii::getAlias('@webroot').'/data_location/tinh_tp.json'));
            $data_district = JSON::decode(file_get_contents(Yii::getAlias('@webroot').'/data_location/quan_huyen.json'));   
            $data_ward = JSON::decode(file_get_contents(Yii::getAlias('@webroot').'/data_location/xa_phuong.json'));

            $model->city=$data_city[$data["Address"]["city"]]["name"];
            $model->district=$data_district[$data["Address"]["district"]]["name"];
            $model->ward=$data_ward[$data["Address"]["ward"]]["name"];

            $model->user_id = Yii::$app->user->id;
            $model->city_search = $this->convert_vi_to_en($model->city);
            $model->district_search = $this->convert_vi_to_en($model->district);
            $model->ward_search = $this->convert_vi_to_en($model->ward);

            $address= $model->address.",".$model->ward.",".$model->district.",".$model->city;
            $geoCodingAddress = $this->geoCoding($address);
            $model->latitude = $geoCodingAddress["lat"];
            $model->longitude = $geoCodingAddress["lng"];
            $model->save();
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Address model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Address model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Address the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Address::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function checkDistrict($textDistrict)
    {
        if (strpos($textDistrict, 'quan') !== false) {
            return $textDistrict;
        } else {
            return "quan_$textDistrict";
        }
    }

    protected function checkWard($textWard)
    {
        if (strpos($textWard, 'phuong') !== false) {
            return $textWard;
        } else {
            return "phuong_$textWard";
        }
    }
}
