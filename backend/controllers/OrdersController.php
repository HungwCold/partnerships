<?php

namespace backend\controllers;

use Yii;
use app\models\Orders;
use app\models\OrdersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\web\Response;
use app\models\StatusRoom;
use app\models\Rooms;
use app\models\RoomHistory;
use app\models\ServicesSearch;
use app\models\OrdersItems;

/**
 * OrdersController implements the CRUD actions for Orders model.
 */
class OrdersController extends Controller
{
    const STATUS_CREATED = 3;

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'new-orders', 'add-item', 'remove-item'],
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'new-orders', 'add-item', 'remove-item'],
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

    public function beforeAction($action) 
    { 
        $this->enableCsrfValidation = false; 
        return parent::beforeAction($action);
    }

    /**
     * Creates a new Bill detail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAddItem() {
        Yii::$app->response->format = Response::FORMAT_JSON; 
        if (Yii::$app->request->post()) {
            $dataPost = Yii::$app->request->post();
            $model =  new OrdersItems;
            $model->id_order = $dataPost['IncrementId'];
            $model->id_service = $dataPost['IdMenu'];
            $model->price = $dataPost['Price'];
            $model->quantity = 1;
            $model->save();
            return Json::encode([
                'message' => 'Save success'
            ]);
        }
        
    }

    /**
     * Creates a new Bill detail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionRemoveItem()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (Yii::$app->request->post()) {
            $dataPost = Yii::$app->request->post();
            OrdersItems::findOne([
                'id_order' => $dataPost['IncrementId'],
                'id_service' => $dataPost['IdMenu'],
            ])->delete();
            return Json::encode([
                'message' => 'Delete is success'
            ]);
        }
        
    }

    /**
     * Lists all Orders models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrdersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionNewOrders()
    {
        $status = 1;
        $searchModel = new OrdersSearch();
        $dataProvider = $searchModel->searchStatus(Yii::$app->request->queryParams, $status);
        return $this->render('new-orders', [
            'model' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionReceivedOrders()
    {
        $status = 2;
        $searchModel = new OrdersSearch();
        $dataProvider = $searchModel->searchStatus(Yii::$app->request->queryParams, $status);
        return $this->render('received-orders', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUnReceivedOrders()
    {
        $status = 3;
        $searchModel = new OrdersSearch();
        $dataProvider = $searchModel->searchStatus(Yii::$app->request->queryParams, $status);
        return $this->render('unReceived-orders', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionOutOfDateOrders()
    {
        $status = 4;
        $searchModel = new OrdersSearch();
        $dataProvider = $searchModel->searchStatus(Yii::$app->request->queryParams, $status);
        return $this->render('outOfDate-orders', [
            'model' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Orders model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = Orders::getIncrementId($id);

        $history = RoomHistory::find()->where(['room_id' => $model->room_id])->asArray()->all();
        $searchServiceModel = new ServicesSearch();
        $dataServiceProvider = $searchServiceModel->search(Yii::$app->request->queryParams);
        $dataOrdersItems = OrdersItems::find()->where(['id_order' => $model->increment_id])->asArray()->all();

        if ($model->status === self::STATUS_CREATED) {
            $order = Orders::find()->where([
                'room_id' => $id,
                'status'=> self::STATUS_CREATED
            ])->one();
        }
        

        return $this->render('view', [
            'model' => $model,
            'modelHistory' => $history,
            'order' => !empty($order) ? $order : null,
            'dataServiceProvider' => $dataServiceProvider,
            'dataOrdersItems' => $dataOrdersItems
        ]);
    }

    /**
     * Creates a new Orders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Orders();
        $model->hotel_id = Yii::$app->user->id;
        $model->status = self::STATUS_CREATED;
        $model->increment_id = date('YmdHis');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $room = $this->findRoomModel($_GET['id']);
            $room->status = self::STATUS_CREATED;
            $room->save();
            return $this->redirect(['view', 'id' => $model->increment_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Orders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Orders model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Orders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Orders::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Finds the Rooms model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Rooms the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findRoomModel($id)
    {
        if (($model = Rooms::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
