<?php

namespace backend\controllers;

use Yii;
use app\models\RoomHistory;
use app\models\RoomHistorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * RoomHistoryController implements the CRUD actions for RoomHistory model.
 */
class RoomHistoryController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create'],
                'rules' => [
                    [
                        'actions' => ['create'],
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
     * Lists all RoomHistory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RoomHistorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RoomHistory model.
     * @param integer $id
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
     * Creates a new RoomHistory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RoomHistory();
        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            $model->user_id = Yii::$app->user->id;
            $model->status = $this->getStatus($model->status);
            $model->created_at = date("Y-m-d h:i:s");
            $model->updated_at = date("Y-m-d h:i:s");
            $model->save();
            return $this->redirect(['/rooms/view', 'id' => $model->room_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function getStatus($status)
    {
        $msg = '';
        switch ($status) {
            case 1:
                $msg = 'Ra ngoài';
                break;
            case 2:
                $msg = 'Chuyển Phòng';
                break;
            case 3:
                $msg = 'Vào Phòng';
                break;
            case 4:
                $msg = 'Other...';
                break;        
        }
        return $msg;
    }

    /**
     * Updates an existing RoomHistory model.
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
     * Deletes an existing RoomHistory model.
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
     * Finds the RoomHistory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RoomHistory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RoomHistory::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
