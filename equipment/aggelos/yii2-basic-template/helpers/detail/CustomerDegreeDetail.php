<?php

namespace app\helpers\detail;


use app\models\generated\Customer;
use app\models\generated\CustomerDegree;
use app\models\Model;
use Yii;

class CustomerDegreeDetail extends AbstractDetail
{
    public function __construct($customer)
    {
        parent::__construct("customer_degree", "Degree");

        $this->model = CustomerDegree::findOne($customer->id);

        $this->init();
    }

    public function setAttributes()
    {
        $this->attributes = [
            "study_degree_id",
            "speciality_id",
            "master_id",
            "phd_id",
            'date_created',
            'date_updated',];

    }

    public function setValues()
    {
        $this->values =

            [
                ["attribute" => "study_degree_id",
                    "value" => function ($model) {
                        return $model->studyDegree->title;
                    },
                ],
                ["attribute" => "speciality_id",
                    "value" => function ($model) {

                        return $model->speciality->title;
                    },
                ],
                ["attribute" => "master_id",
                    "value" => function ($model) {
                        if ($model->master_id)
                            return $model->master->title;
                    },
                ],
                ["attribute" => "phd_id",
                    "value" => function ($model) {
                        if ($model->phd_id)
                            return $model->phd->title;
                    },
                ],
                ["attribute" => "date_created",
                    "value" => function ($model) {
                        return $model->date_created;
                    },
                    "format" => "date"],
                ["attribute" => "date_updated",
                    "value" => function ($model) {
                        return $model->date_updated;
                    },
                    "format" => "date"],];

    }

}
