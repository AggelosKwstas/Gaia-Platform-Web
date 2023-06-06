<?php

namespace app\controllers;

use app\models\Measurements;
use app\models\MeasurementsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MeasurementsController implements the CRUD actions for Measurements model.
 */
class MeasurementsController extends Controller
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
     * Lists all Measurements models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MeasurementsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Measurements model.
     * @param int $id ID
     * @param string $timestamp Timestamp
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $timestamp)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $timestamp),
        ]);
    }

    /**
     * Creates a new Measurements model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Measurements();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id, 'timestamp' => $model->timestamp]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Measurements model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @param string $timestamp Timestamp
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $timestamp)
    {
        $model = $this->findModel($id, $timestamp);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'timestamp' => $model->timestamp]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Measurements model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @param string $timestamp Timestamp
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $timestamp)
    {
        $this->findModel($id, $timestamp)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Measurements model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @param string $timestamp Timestamp
     * @return Measurements the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $timestamp)
    {
        if (($model = Measurements::findOne(['id' => $id, 'timestamp' => $timestamp])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
