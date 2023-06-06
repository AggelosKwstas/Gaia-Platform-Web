<?php

namespace app\controllers;

use app\models\SensorInputPosition;
use app\models\SensorInputPositionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SensorInputPositionController implements the CRUD actions for SensorInputPosition model.
 */
class SensorInputPositionController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all SensorInputPosition models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SensorInputPositionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SensorInputPosition model.
     * @param int $sensor_id Sensor ID
     * @param int $input_position_id Input Position ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($sensor_id, $input_position_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($sensor_id, $input_position_id),
        ]);
    }

    /**
     * Creates a new SensorInputPosition model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new SensorInputPosition();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'sensor_id' => $model->sensor_id, 'input_position_id' => $model->input_position_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SensorInputPosition model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $sensor_id Sensor ID
     * @param int $input_position_id Input Position ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($sensor_id, $input_position_id)
    {
        $model = $this->findModel($sensor_id, $input_position_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'sensor_id' => $model->sensor_id, 'input_position_id' => $model->input_position_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SensorInputPosition model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $sensor_id Sensor ID
     * @param int $input_position_id Input Position ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($sensor_id, $input_position_id)
    {
        $this->findModel($sensor_id, $input_position_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SensorInputPosition model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $sensor_id Sensor ID
     * @param int $input_position_id Input Position ID
     * @return SensorInputPosition the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($sensor_id, $input_position_id)
    {
        if (($model = SensorInputPosition::findOne(['sensor_id' => $sensor_id, 'input_position_id' => $input_position_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
