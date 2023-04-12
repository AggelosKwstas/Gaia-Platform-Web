<?php

namespace app\controllers;

use app\models\EquipmentImage;
use app\models\EquipmentImageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EquipmentImageController implements the CRUD actions for EquipmentImage model.
 */
class EquipmentImageController extends Controller
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
     * Lists all EquipmentImage models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new EquipmentImageSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EquipmentImage model.
     * @param int $equipment_id Equipment ID
     * @param int $equipment_image Equipment Image
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($equipment_id, $equipment_image)
    {
        return $this->render('view', [
            'model' => $this->findModel($equipment_id, $equipment_image),
        ]);
    }

    /**
     * Creates a new EquipmentImage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new EquipmentImage();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'equipment_id' => $model->equipment_id, 'equipment_image' => $model->equipment_image]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing EquipmentImage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $equipment_id Equipment ID
     * @param int $equipment_image Equipment Image
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($equipment_id, $equipment_image)
    {
        $model = $this->findModel($equipment_id, $equipment_image);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'equipment_id' => $model->equipment_id, 'equipment_image' => $model->equipment_image]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing EquipmentImage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $equipment_id Equipment ID
     * @param int $equipment_image Equipment Image
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($equipment_id, $equipment_image)
    {
        $this->findModel($equipment_id, $equipment_image)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EquipmentImage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $equipment_id Equipment ID
     * @param int $equipment_image Equipment Image
     * @return EquipmentImage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($equipment_id, $equipment_image)
    {
        if (($model = EquipmentImage::findOne(['equipment_id' => $equipment_id, 'equipment_image' => $equipment_image])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
