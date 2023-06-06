<?php

namespace app\controllers;

use app\models\NodeSensors;
use app\models\NodeSensorsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NodeSensorsController implements the CRUD actions for NodeSensors model.
 */
class NodeSensorsController extends Controller
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
     * Lists all NodeSensors models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new NodeSensorsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NodeSensors model.
     * @param int $sensor_id Sensor ID
     * @param int $node_id Node ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($sensor_id, $node_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($sensor_id, $node_id),
        ]);
    }

    /**
     * Creates a new NodeSensors model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new NodeSensors();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'sensor_id' => $model->sensor_id, 'node_id' => $model->node_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing NodeSensors model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $sensor_id Sensor ID
     * @param int $node_id Node ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($sensor_id, $node_id)
    {
        $model = $this->findModel($sensor_id, $node_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'sensor_id' => $model->sensor_id, 'node_id' => $model->node_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing NodeSensors model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $sensor_id Sensor ID
     * @param int $node_id Node ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($sensor_id, $node_id)
    {
        $this->findModel($sensor_id, $node_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the NodeSensors model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $sensor_id Sensor ID
     * @param int $node_id Node ID
     * @return NodeSensors the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($sensor_id, $node_id)
    {
        if (($model = NodeSensors::findOne(['sensor_id' => $sensor_id, 'node_id' => $node_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
