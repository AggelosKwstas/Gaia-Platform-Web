<?php

namespace app\controllers;

use app\helpers\client\ClientHelper;
use app\models\pure\Customer;
use app\models\pure\File;
use app\models\search\ClientSearch;
use Yii;
use yii\base\Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CustomerController implements the CRUD actions for Customer model.
 */
class CustomerController extends AuthedController
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
     * Lists all Customer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClientSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Customer model.
     * @param int $id ID
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
     * Creates a new Customer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id = null)
    {
        return (new ClientHelper($this, $id))->actionCustomer();

    }

    public function actionDegree($id = null)
    {
        return (new ClientHelper($this, $id))->actionCustomerDegree();

    }

    public function actionForeignLanguage($id = null)
    {
        return (new ClientHelper($this, $id))->actionCustomerLanguage();

    }

    public function actionComputerSkills($id = null)
    {
        return (new ClientHelper($this, $id))->actionCustomerComputerSkills();

    }

    public function actionProfessionalExperience($id = null)
    {
        return (new ClientHelper($this, $id))->actionCustomerProfessionalExperience();

    }

    public function actionInterview($id = null)
    {
        return (new ClientHelper($this, $id))->actionCustomerInterview();

    }


    public function actionDeleteBiographyFile($customer_id)
    {



        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $client_helper = new ClientHelper($this, $customer_id);
        if (isset(Yii::$app->request->post()["key"])) {
            $id = Yii::$app->request->post()["key"];


            $model = File::findBySql("select [file].* from [file] inner join customer_biography_file on biography_file_id=[file].id and customer_id={$client_helper->customer->id} and id=$id")->one();
            if($model&&  $model->delete()){
                return ["success" => 1,
                ];
            }
        }

        return new Exception("wrong key");
    }

    /**
     * Updates an existing Customer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        return $this->redirect(["create", "id" => $id,
        ]);
    }

    /**
     * Deletes an existing Customer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Customer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Customer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Customer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
