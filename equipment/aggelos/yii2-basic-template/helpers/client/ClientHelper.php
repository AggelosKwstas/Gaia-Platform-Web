<?php

namespace app\helpers\client;

use app\helpers\Override\ArrayHelper;
use app\models\all\Patient;
use app\models\all\PatientTab;
use app\models\generated\CustomerDegree;
use app\models\pure\Customer;
use app\models\pure\CustomerBiographyFile;
use app\models\pure\CustomerComputerSkills;
use app\models\pure\CustomerInterview;
use app\models\pure\CustomerLanguage;
use app\models\pure\CustomerProfessionalExperience;
use app\models\pure\CustomerProfessionalExperienceSkills;
use app\models\pure\File;
use app\models\pure\Image;
use Yii;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class ClientHelper
{
    public $customer;
    public $controller;


    public function __construct($controller, $id = null)
    {
        $this->controller = $controller;
        if ($id) {
            $this->customer = $this->findModel($id);
            $this->isEmpty = false;
        } else
            $this->customer = new Customer();


    }

    private function showSession($entity_name)
    {

        Yii::$app->session->setFlash('success', Yii::t("app", "Data were saved for ") . Yii::t("app", $entity_name));
    }

    private function params($params)
    {
        $all_params = array_merge([

            "required" => false,
            "tab" => false,
            "other" => [],
            "customer" => $this->customer,


        ], $params);

        return $this->controller->render('tab', $all_params);
    }

    public function actionCustomer()
    {

        $model = $this->customer->id ? $this->customer : new Customer();
        $required = true;
        if ($this->customer->id)
            $required = false;


        if ($model->load(Yii::$app->request->post())) {


            if ($model->save()) {


                $this->customer = $model;
                $this->showSession("Customer");

                return $this->controller->redirect(['create', "id" => $this->customer->id]);


            }
        }

        return $this->params(["model" => $model,
            "required" => $required,
            "form" => "customer",]);
    }

    public function actionCustomerDegree()
    {
        $model = CustomerDegree::findOne($this->customer->id);
        $model = $model ? $model : new CustomerDegree();
        if ($model->load(Yii::$app->request->post())) {
            $model->customer_id = $this->customer->id;
            if ($model->save())
                $this->showSession("Degree");
        }
        return $this->params(["model" => $model,

            "form" => "customer_degree",]);
    }

    public function actionCustomerLanguage()
    {
        $model = CustomerLanguage::findOne($this->customer->id);
        $model = $model ? $model : new CustomerLanguage();
        if ($model->load(Yii::$app->request->post())) {
            $model->customer_id = $this->customer->id;
            if ($model->save())
                $this->showSession("Foreign Languages");
        }
        return $this->params(["model" => $model,

            "form" => "customer_foreign_language",]);
    }

    public function actionCustomerComputerSkills()
    {
        $model = CustomerComputerSkills::findOne($this->customer->id);
        $model = $model ? $model : new CustomerComputerSkills();
        if ($model->load(Yii::$app->request->post())) {
            $model->customer_id = $this->customer->id;
            if ($model->save())
                $this->showSession("Computer Skills");
        }
        return $this->params(["model" => $model,

            "form" => "customer_computer_skills",]);
    }

    public function actionCustomerProfessionalExperience()
    {
        $model = CustomerProfessionalExperience::findOne($this->customer->id);
        $model = $model ? $model : new CustomerProfessionalExperience();
        $customer_skills = null;
        if ($model->customer_id) {
            $customer_skills = CustomerProfessionalExperienceSkills::findAll(["customer_id" => $model->customer_id]);
        }
        if ($model->load(Yii::$app->request->post()) && $model) {


            $model->customer_id = $this->customer->id;

            if ($model->save())
                $this->showSession("Professional Experience");

            if (isset($this->controller->request->post()["CustomerProfessionalExperienceSkills"]) && isset($this->controller->request->post()["CustomerProfessionalExperienceSkills"]["skill_id"])) {


                $skill_ids = $this->controller->request->post()["CustomerProfessionalExperienceSkills"]["skill_id"];

                $old_ids = ArrayHelper::getModelAttribute($customer_skills, "skill_id");

                $diff_ids = array_diff($old_ids, $skill_ids);
                $new_ids = array_diff($skill_ids, $old_ids);
                if (isset($new_ids) && count($new_ids))
                    foreach ($new_ids as $skill_id) {

                        $model_customer_skill = new CustomerProfessionalExperienceSkills();
                        $model_customer_skill->customer_id = $this->customer->id;
                        $model_customer_skill->skill_id = $skill_id;
                        $model_customer_skill->save();

                    }
                if (count($diff_ids))
                    CustomerProfessionalExperienceSkills::deleteAll("customer_id={$this->customer->id} and skill_id in (" . implode(",", $diff_ids) . ")");


            } else if ($customer_skills && count($customer_skills)) {

                $old_ids = ArrayHelper::getModelAttribute($customer_skills, "skill_id");
                CustomerProfessionalExperienceSkills::deleteAll("customer_id={$this->customer->id} and skill_id in (" . implode(",", $old_ids) . ")");
            }

            $customer_skills = CustomerProfessionalExperienceSkills::findAll(["customer_id" => $model->customer_id]);
        }
        return $this->params(["model" => $model,
            "other" => [
                "skills" => $customer_skills,
            ],


            "form" => "customer_professional_experience",]);
    }

    public function actionCustomerInterview()
    {
        $model = CustomerInterview::findOne($this->customer->id);
        $model = $model ? $model : new CustomerInterview();
        $files_model = File::findBySql("select file.* from file inner join customer_biography_file on customer_biography_file.biography_file_id=file.id and customer_biography_file.customer_id={$this->customer->id}")->all();
        $file = new File();
        if ($model->load(Yii::$app->request->post()) && $file->load(Yii::$app->request->post())) {

            $files = UploadedFile::getInstances($file, 'files_input');


            if (count($files)) {

                foreach ($files as $key => $file_input) {
                    $file_model = new File();
                    $file_model->file_input = $file_input;
                    if ($file_model->save()) {


                        $customer_file = new CustomerBiographyFile();
                        $customer_file->biography_file_id = $file_model->id;
                        $customer_file->customer_id = $this->customer->id;
                        $customer_file->save();

                    }


                }
            }

            $files_model = File::findBySql("select file.* from file inner join customer_biography_file on customer_biography_file.biography_file_id=file.id and customer_biography_file.customer_id={$this->customer->id}")->all();

            $model->customer_id = $this->customer->id;
            if ($model->save())
                $this->showSession("Interview");
        }
        return $this->params(["model" => $model,
            "other" => [
                "files" => $files_model,
            ],


            "form" => "customer_interview",]);
    }

    protected
    function findModel($id)
    {
        if (($model = Customer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
