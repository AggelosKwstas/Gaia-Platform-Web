<?php

namespace app\helpers\detail;


use app\models\generated\Customer;
use app\models\Model;
use app\models\pure\Skill;
use Yii;
use yii\helpers\Html;

class CustomerProfessionalExperienceDetail extends AbstractDetail
{
    public function __construct($customer)
    {
        parent::__construct("customer_professional_experience", "Professional Experience");

        $this->model = \app\models\pure\CustomerProfessionalExperience::findOne($customer->id);
        $this->init();
    }

    public function setAttributes()
    {
        $this->attributes = [
            'last_job_title_id',
            "skill",
            'last_company_worked',

            'knows_photovoltaic',
            'knows_current',
            'date_created',
            'date_updated',];

    }

    public function setValues()
    {
        $this->values =

            [
                ["attribute" => "last_job_title_id",
                    "value" => function ($model) {
                        return $model->lastJobTitle->title;
                    },
                ],

                ["attribute" => "skill",
                    "value" => function ($model) {
                        $skills = Skill::findBySql("select skill.* from skill inner join customer_professional_experience_skills on skill_id=skill.id and customer_id=$model->customer_id")->all();
                        $result = "";
                        if (count($skills)) {
                            $result = "<div class='row'><ul>";
                            foreach ($skills as $model) {


                                $result .= "<li>" . $model->title . "</li>";
                            }

                            $result .= "</ul></div>";
                        }
                        return $result;
                    },
                    "label" => Yii::t("app", "Skill"),

                    "format" => "raw"
                ],
                "last_company_worked",
                ["attribute" => "knows_photovoltaic",
                    "value" => function ($model) {
                        return Model::findBoolean($model->knows_photovoltaic);
                    }],
                ["attribute" => "knows_current",
                    "value" => function ($model) {
                        return Model::findBoolean($model->knows_current);
                    }],

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
