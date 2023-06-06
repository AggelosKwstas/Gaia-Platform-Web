<?php

namespace app\controllers;

use app\models\ProjectNode;
use app\models\ProjectNodeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProjectNodeController implements the CRUD actions for ProjectNode model.
 */
class ProjectNodeController extends Controller
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
     * Lists all ProjectNode models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProjectNodeSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProjectNode model.
     * @param int $project_id Project ID
     * @param int $node_id Node ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($project_id, $node_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($project_id, $node_id),
        ]);
    }

    /**
     * Creates a new ProjectNode model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ProjectNode();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'project_id' => $model->project_id, 'node_id' => $model->node_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProjectNode model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $project_id Project ID
     * @param int $node_id Node ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($project_id, $node_id)
    {
        $model = $this->findModel($project_id, $node_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'project_id' => $model->project_id, 'node_id' => $model->node_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProjectNode model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $project_id Project ID
     * @param int $node_id Node ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($project_id, $node_id)
    {
        $this->findModel($project_id, $node_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProjectNode model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $project_id Project ID
     * @param int $node_id Node ID
     * @return ProjectNode the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($project_id, $node_id)
    {
        if (($model = ProjectNode::findOne(['project_id' => $project_id, 'node_id' => $node_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
