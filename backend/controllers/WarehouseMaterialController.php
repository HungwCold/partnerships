<?php

namespace backend\controllers;

use Yii;
use app\models\WarehouseMaterial;
use app\models\WarehouseMaterialSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\WareHouse;
use app\models\ProductUnit;
use app\models\GroupFood;

/**
 * WarehouseMaterialController implements the CRUD actions for WarehouseMaterial model.
 */
class WarehouseMaterialController extends Controller
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
     * Lists all WarehouseMaterial models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WarehouseMaterialSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WarehouseMaterial model.
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
     * Creates a new WarehouseMaterial model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new WarehouseMaterial();
        $dataWareHouse = WareHouse::find()->where(['hotel_id' => Yii::$app->user->id])->asArray()->all();
        $dataPUnit = ProductUnit::find()->where(['hotel_id' => Yii::$app->user->id])->asArray()->all();
        $dataGroupFood = GroupFood::find()->where(['hotel_id' => Yii::$app->user->id])->asArray()->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'modelWareHouse' => $dataWareHouse,
            'modelPUnit' => $dataPUnit,
            'modelGroupFood' => $dataGroupFood,
        ]);
    }

    /**
     * Updates an existing WarehouseMaterial model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $dataWareHouse = WareHouse::find()->where(['hotel_id' => Yii::$app->user->id])->asArray()->all();
        $dataPUnit = ProductUnit::find()->where(['hotel_id' => Yii::$app->user->id])->asArray()->all();
        $dataGroupFood = GroupFood::find()->where(['hotel_id' => Yii::$app->user->id])->asArray()->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'modelWareHouse' => $dataWareHouse,
            'modelPUnit' => $dataPUnit,
            'modelGroupFood' => $dataGroupFood,
        ]);
    }

    /**
     * Deletes an existing WarehouseMaterial model.
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
     * Finds the WarehouseMaterial model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WarehouseMaterial the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WarehouseMaterial::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
