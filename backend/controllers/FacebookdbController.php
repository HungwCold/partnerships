<?php

namespace backend\controllers;

use Yii;
use app\models\Facebookdb;
use app\models\Facebooktype;
use app\models\Facebookconfig;
use app\models\FacebookdbSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * FacebookdbController implements the CRUD actions for Facebookdb model.
 */
class FacebookdbController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => [
                            'logout', 
                            'index', 
                            'create', 
                            'api', 
                            'contact', 
                            'phone', 
                            'token', 
                            'json',
                            'token-zalo'
                        ],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    public function actionTokenZalo()
    {
        $this->layout = 'facebook';
        $access_token = Yii::$app->request->post('access_token');
        $message = Yii::$app->request->post('message');
        if ($access_token) {
            $summary = $this->getSummary($access_token);
            $item = round($summary / 100);
            for ($i=0; $i < $item; $i++) { 
                $users = $this->getZaloData($i*100, $access_token);
                foreach ($users as $key => $value) {
                    $this->sendSmsZalo($value['id'], $access_token, $message);
                    die;
                }
            }
            Yii::$app->session->setFlash('success', "Sent SMS successfully.");
            return $this->redirect(['index']);
        }
        
        return $this->render('zalo', [
        ]);
    }

    public function sendSmsZalo($id, $access_token, $message)
    {
        $ch = curl_init();
        $post = [
            'access_token' => $access_token,
            'to' => $id,
            'message' => $message
        ];

        curl_setopt($ch, CURLOPT_URL,"https://graph.zalo.me/v2.0/apprequests");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close($ch);
        var_dump($server_output); die;
        return;
    }

    public function getSummary($access_token)
    {
        $url = 'https://graph.zalo.me/v2.0/me/invitable_friends?offset=0&limit=1&fields=id&access_token='.$access_token;
        $cURLConnection = curl_init();
        curl_setopt($cURLConnection, CURLOPT_URL, $url);
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
        $dataList = curl_exec($cURLConnection);
        curl_close($cURLConnection);
        $dataContent = json_decode($dataList, true);
        return $dataContent['summary']['total_count'];
    }

    public function getZaloData($id, $access_token)
    {
        $url = 'https://graph.zalo.me/v2.0/me/invitable_friends?offset='.$id.'&limit=100&fields=id&access_token='.$access_token;
        $cURLConnection = curl_init();
        curl_setopt($cURLConnection, CURLOPT_URL, $url);
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
        $dataList = curl_exec($cURLConnection);
        curl_close($cURLConnection);
        $dataContent = json_decode($dataList, true);
        return $dataContent['data'];
    }

    /**
     * Lists all Facebookdb models.
     * @return mixed
     */
    public function actionIndex()
    {
        //echo Yii::$app->getSecurity()->generatePasswordHash('Abcde@1234'); die;
        $this->layout = 'facebook';
        $searchModel = new FacebookdbSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $modelType = Facebooktype::find()->select(['id', 'name'])->asArray()->all();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'modelType' => $modelType
        ]);
    }

    /**
     * Displays a single Facebookdb model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->layout = 'facebook';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Facebookdb model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'facebook';
        $model = new Facebookdb();
        $modelType = Facebooktype::find()->select(['id', 'name'])->asArray()->all();
        $data = Yii::$app->request->post();
        if ($data) {
            $list = explode("\n", $data['Facebookdb']['list_content']);
            $comment = $data['Facebookdb']['comment'];
            set_time_limit(500);
            foreach ($list as $key => $value) {
                $modelItem = new Facebookdb();
                $profile = explode( ',', $value);
                $modelItem->uid = trim($profile[0]);
                $modelItem->name = trim($profile[1]);
                $modelItem->comment = $comment;
                $modelItem->phone = $this->getPhoneApi(trim($profile[0]));
                $modelItem->save();
            }
            return $this->redirect(['index']);
        }
        
        return $this->render('create', [
            'model' => $model,
            'modelType' => $modelType
        ]);
    }


    /**
     * Creates a new Facebookdb model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionJson()
    {
        $this->layout = 'facebook';
        $model = new Facebookdb();
        $modelType = Facebooktype::find()->select(['id', 'name'])->asArray()->all();
        $data = Yii::$app->request->post();
        if ($data) {
            $list = json_decode($data['Facebookdb']['list_content'], true);
            $comment = $data['Facebookdb']['comment'];
            set_time_limit(500);
            foreach ($list['data'] as $key => $value) {
                $checkUID = Facebookdb::getUID($value['id']);
                if (empty($checkUID)) {
                   $modelItem = new Facebookdb();
                    $modelItem->uid = trim($value['id']);
                    $modelItem->name = trim($value['name']);
                    $modelItem->comment = $comment;
                    $modelItem->phone = $this->getPhoneApi(trim($value['id']));
                    $modelItem->save();
                }
            }
            return $this->redirect(['index']);
        }
        
        return $this->render('create', [
            'model' => $model,
            'modelType' => $modelType
        ]);
    }

    public function getPhoneApi($uid)
    {
        $model = Facebookconfig::findOne(1);
        $url = 'http://api.vltoolkit.com/api/Convert?uid='.trim($uid).'&apikey='.trim($model->apikey);
        $cURLConnection = curl_init();
        curl_setopt($cURLConnection, CURLOPT_URL, $url);
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
        $phoneList = curl_exec($cURLConnection);
        curl_close($cURLConnection);
        $content = json_decode($phoneList, true);
        if ($content['IsSuccess']) {
            return $content['Mobile'];
        } else {
            return 'None';
        }
    }

    /**
     * Updates an existing Facebookdb model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $sex, $old)
    {
        try {
            $model = $this->findModel($id);
            $model->sex = $sex;
            $model->old = $old;
            $model->save();
        } catch (Exception $e) {
           throw new NotFoundHttpException('The requested page does not exist.');
        }
        
    }

    /**
     * Updates an existing Facebookdb model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionApi()
    {
        $this->layout = 'facebook';
        $model = Facebookconfig::findOne(1);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('api', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Facebookdb model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionToken()
    {
        $this->layout = 'facebook';
        $model = Facebookconfig::findOne(2);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('api', [
            'model' => $model,
        ]);
    }

    public function actionContact() {
        if (!empty(Yii::$app->request->queryParams)) {
            $searchModel = new FacebookdbSearch();
            $dataProvider = $searchModel->searchExport(Yii::$app->request->queryParams);

            header( 'Content-Type: text/csv; charset=utf8' );
            header( 'Content-Disposition: attachment; filename=contactgoogle.csv' );
            header("Pragma: no-cache");
            header("Expires: 0");
            $output = fopen('php://output', 'w');

            // header csv file
            fputcsv($output, ['Name','Given Name','Additional Name','Family Name','Yomi Name','Given Name Yomi','Additional Name Yomi','Family Name Yomi','Name Prefix','Name Suffix','Initials','Nickname','Short Name','Maiden Name','Birthday','Gender','Location','Billing Information','Directory Server','Mileage','Occupation','Hobby','Sensitivity','Priority','Subject','Notes','Language','Photo','Group Membership','Phone 1 - Type','Phone 1 - Value'], ',' );
            // lists
            foreach ($dataProvider->models as $model) {
                $value= [
                    $model->name,
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    'Ngày nhập: 10/9 ::: * myContacts',
                    "",
                    $model->phone
                ];
                fputcsv($output, $value, ',');
            }
            fclose($output);
            die;
        } else {
            return $this->redirect(['index']);
        }
    }

    public function actionPhone() {
        if (!empty(Yii::$app->request->queryParams)) {
            $searchModel = new FacebookdbSearch();
            $dataProvider = $searchModel->searchExportPhone(Yii::$app->request->queryParams);
            header( 'Content-Type: text/csv; charset=utf8' );
            header( 'Content-Disposition: attachment; filename=phoneAds.csv' );
            header("Pragma: no-cache");
            header("Expires: 0");
            $output = fopen('php://output', 'w');

            foreach ($dataProvider->models as $model) {
                $value= [
                    $model->phone,
                ];
                fputcsv($output, $value, ',');
            }
            fclose($output);
            die;
        } else {
            return $this->redirect(['index']);
        }
    }

    /**
     * Deletes an existing Facebookdb model.
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
     * Finds the Facebookdb model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Facebookdb the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Facebookdb::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
