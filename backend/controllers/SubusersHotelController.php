<?php

namespace backend\controllers;

use Yii;
use app\models\SubusersHotel;
use app\models\SubusersHotelSearch;
use app\models\PositionHotel;
use app\models\Timesheet;
use app\models\Sex;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Json;

/**
 * SubusersHotelController implements the CRUD actions for SubusersHotel model.
 */
class SubusersHotelController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'update', 'timekeeping'],
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'update', 'timekeeping'],
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
     * Lists all SubusersHotel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SubusersHotelSearch();
        $modelPosition = PositionHotel::find()->where(['hotel_id' => Yii::$app->user->id])->asArray()->all();
        $modelSex = Sex::find()->asArray()->all();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'modelPosition' => $modelPosition,
            'modelSex' => $modelSex,
        ]);
    }


    public function actionTimekeeping()
    {
        $searchModel = new SubusersHotelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('timekeeping', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SubusersHotel model.
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
     * Creates a new SubusersHotel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SubusersHotel();
        $modelPosition = PositionHotel::find()->where(['hotel_id' => Yii::$app->user->id])->asArray()->all();
        $modelSex = Sex::find()->asArray()->all();
        if (Yii::$app->request->post()) {
           $model->load(Yii::$app->request->post());
           $model->hotel_id = Yii::$app->user->id;
           $model->password = sha1($model->password);
           $model->status = 1;
           $model->save();
           return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'dataPosition' => $modelPosition,
            'dataSex' => $modelSex,
        ]);
    }

    /**
     * Updates an existing SubusersHotel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionCalendar($id)
    {
        $model = $this->findModel($id);
        $modelTimesheet = new Timesheet;
        $modelTimesheet->employee_id = $model->id;
        $modelTimesheet->count_days = 5;
        $modelTimesheet->count_hours = 36;
        $modelTimesheet->count_days_off = 2;
        $list_day = Json::encode(Timesheet::find([
            'employee_id' => $model->id,
        ])->select(
            [
                'start' => 'date',
                'end' => 'date',
                'description' => 'comment',
                'title' => 'time_from',
                'className' => 'time_to',
                'icon' => 'time_to'
            ]
            )->asArray()->all());
        if (Yii::$app->request->post()) {
            $modelTimesheet->load(Yii::$app->request->post());
            $modelTimesheet->save();
            return $this->redirect(['timekeeping']);
        }

        return $this->render('calendar', [
            'model' => $model,
            'modelTimesheet' => $modelTimesheet,
            'data_day' => $list_day,
        ]);
    }

    /**
     * Updates an existing SubusersHotel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelPosition = PositionHotel::find()->where(['hotel_id' => Yii::$app->user->id])->asArray()->all();
        $modelSex = Sex::find()->asArray()->all();
        if (Yii::$app->request->post()) {
           $model->load(Yii::$app->request->post());
           $model->hotel_id = Yii::$app->user->id;
           $model->password = sha1($model->password);
           $model->status = 1;
           $model->save();
           return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'dataPosition' => $modelPosition,
            'dataSex' => $modelSex,
        ]);

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SubusersHotel model.
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
     * Finds the SubusersHotel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SubusersHotel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SubusersHotel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
