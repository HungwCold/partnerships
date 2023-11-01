<?php

namespace backend\controllers;

use Yii;
use app\models\Rooms;
use app\models\RoomSearch;
use app\models\StatusRoom;
use app\models\TypeRooms;
use app\models\RoomHistory;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Orders;
use app\models\ServicesSearch;
use app\models\OrdersItems;

/**
 * RoomsController implements the CRUD actions for Rooms model.
 */
class RoomsController extends Controller
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
                'only' => ['index', 'status', 'list', 'create'],
                'rules' => [
                    [
                        'actions' => ['index', 'status', 'list', 'create'],
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

    /**
     * Lists all Rooms models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RoomSearch();
        $dataProviderStatus = StatusRoom::find()->asArray()->all();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dataProviderStatus' => $dataProviderStatus,
        ]);
    }

    /**
     * Lists all Rooms models.
     * @return mixed
     */
    public function actionList()
    {
        $searchModel = new RoomSearch();
        $dataProviderStatus = StatusRoom::find()->asArray()->all();
        $dataTypeRoom = TypeRooms::find()->asArray()->all();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dataProviderStatus' => $dataProviderStatus,
            'dataTypeRoom' => $dataTypeRoom,
        ]);
    }

    /**
     * Displays a single Rooms model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $history = RoomHistory::find()->where(['room_id' => $id])->asArray()->all();
        $searchServiceModel = new ServicesSearch();
        $dataServiceProvider = $searchServiceModel->search(Yii::$app->request->queryParams);
        $model = $this->findModel($id);
        $dataOrdersItems = OrdersItems::find()->where(['id_service' => $id])->asArray()->all();
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
     * Creates a new Rooms model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Rooms();
        $dataProviderStatus = StatusRoom::find()->asArray()->all();
        $dataTypeRoom = TypeRooms::find()->asArray()->all();
        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            $model->user_id = Yii::$app->user->id;
            $model->save();
            return $this->redirect(['list']);
        }
        return $this->render('create', [
            'model' => $model,
            'dataProviderStatus' => $dataProviderStatus,
            'dataTypeRoom' => $dataTypeRoom,
        ]);
    }

    /**
     * Updates an existing Rooms model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $dataProviderStatus = StatusRoom::find()->asArray()->all();
        $dataTypeRoom = TypeRooms::find()->asArray()->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['list']);
        }

        return $this->render('update', [
            'model' => $model,
            'dataProviderStatus' => $dataProviderStatus,
            'dataTypeRoom' => $dataTypeRoom,
        ]);
    }


    /**
     * Updates an existing Orders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionStatus($id)
    {
        $model = $this->findModel($id);
        $dataProviderStatus = StatusRoom::find()->asArray()->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('status', [
            'model' => $model,
            'dataProviderStatus' => $dataProviderStatus,
        ]);
    }


    /**
     * Deletes an existing Rooms model.
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
     * Finds the Rooms model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Rooms the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Rooms::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Finds the Orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Orders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findOrderModel($id)
    {
        if (($model = Orders::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
