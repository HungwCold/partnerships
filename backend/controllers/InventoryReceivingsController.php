<?php

namespace backend\controllers;

use Yii;
use app\models\InventoryReceivings;
use app\models\InventoryReceivingsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\SubusersHotel;
use app\models\WareHouse;
use app\models\Supplier;
use app\models\MoneyFund;

/**
 * InventoryReceivingsController implements the CRUD actions for InventoryReceivings model.
 */
class InventoryReceivingsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all InventoryReceivings models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InventoryReceivingsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataWareHouse = WareHouse::find()->where(['hotel_id' => Yii::$app->user->id])->asArray()->all();
        $dataSubusersHotel = SubusersHotel::find()->where(['hotel_id' => Yii::$app->user->id])->asArray()->all();
        $dataSupplier = Supplier::find()->where(['hotel_id' => Yii::$app->user->id])->asArray()->all();
        $dataMoney = MoneyFund::find()->asArray()->all();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'modelWareHouse' => $dataWareHouse,
            'modelSubusersHotel' => $dataSubusersHotel,
            'modelSupplier' => $dataSupplier,
            'modelMoney' => $dataMoney,
        ]);
    }

    /**
     * Displays a single InventoryReceivings model.
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
     * Creates a new InventoryReceivings model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new InventoryReceivings();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing InventoryReceivings model.
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
     * Deletes an existing InventoryReceivings model.
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
     * Finds the InventoryReceivings model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InventoryReceivings the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InventoryReceivings::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
