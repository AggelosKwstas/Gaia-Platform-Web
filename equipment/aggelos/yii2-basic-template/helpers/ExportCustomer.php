<?php

namespace app\helpers;

use app\helpers\Override\ArrayHelper;
use app\models\Model;
use app\models\pure\EnglishDiploma;
use app\models\pure\File;
use app\models\pure\JobTitle;
use app\models\pure\Master;
use app\models\pure\PCAutoCad;
use app\models\pure\PCERP;
use app\models\pure\PCGeneralKnowledge;
use app\models\pure\PCPvsyst;
use app\models\pure\Phd;
use app\models\pure\Skill;
use app\models\pure\Speciality;
use app\models\pure\StudyDegree;
use kartik\export\ExportMenu;
use Yii;
use yii\helpers\Html;
use yii\helpers\Url;

class ExportCustomer
{

    public $dataProvider;

    public function __construct($dataProvider)
    {
        $this->dataProvider = $dataProvider;
    }

    public function getColumns()
    {
        return [
            ['class' => 'yii\grid\SerialColumn'],

            'id',

            'firstname',
            'lastname',
            'email:email',
            'date_born',
            ["attribute" => "family_status_id",
                "value" => "familyStatus.title",
            ],

            'home_phone',
            'phone',
            ["attribute" => "county_residence_id",
                "value" => "countyResidence.title"],
            'city_residence',
            ["attribute" => "gender_id",
                "value" => "gender.pretty_name",
            ],
            ["attribute" => "car_diploma_id",
                "value" => "carDiploma.title",
            ],
            ["attribute" => "military_duties",
                "value" => function ($model) {
                    return Model::findBooleanNA($model->military_duties);
                },
            ],

            'field1',
            'field2',
            'field3',


            ["attribute" => "study_degree_id",
                "value" => function ($model) {
                    if ($model->study_degree_id) {
                        return StudyDegree::findOne($model->study_degree_id)->title;
                    }
                },
            ],
            ["attribute" => "speciality_id",
                "value" => function ($model) {
                    if ($model->speciality_id) {
                        return Speciality::findOne($model->speciality_id)->title;
                    }
                },
            ],

            ["attribute" => "master_id",
                "value" => function ($model) {
                    if ($model->master_id) {
                        return Master::findOne($model->master_id)->title;
                    }
                },
            ],
            ["attribute" => "phd_id",
                "value" => function ($model) {
                    if ($model->phd_id) {
                        return Phd::findOne($model->phd_id)->title;
                    }
                },
            ],
            ["attribute" => "english_diploma_id",
                "value" => function ($model) {
                    if ($model->english_diploma_id) {
                        return EnglishDiploma::findOne($model->english_diploma_id)->title;
                    }
                },
            ],
            ["attribute" => "other_languages",
                "value" => function ($model) {
                    if ($model->other_languages)
                        return $model->other_languages;
                }],

            ["attribute" => "pc_general_knowledge_id",
                "value" => function ($model) {
                    if (isset($model->pc_general_knowledge_id)) {
                        return PCGeneralKnowledge::findOne($model->pc_general_knowledge_id)->title;
                    }
                },
            ],

            ["attribute" => "pc_autocad_id",
                "value" => function ($model) {
                    if (isset($model->pc_autocad_id)) {
                        return PCAutoCad::findOne($model->pc_autocad_id)->title;
                    }
                },
            ],
            ["attribute" => "pc_pvsyst_id",
                "value" => function ($model) {
                    if (isset($model->pc_pvsyst_id)) {
                        return PCPvsyst::findOne($model->pc_autocad_id)->title;
                    }
                },
            ],
            ["attribute" => "pc_erp_id",
                "value" => function ($model) {
                    if (isset($model->pc_erp_id)) {
                        return PCERP::findOne($model->pc_erp_id)->title;
                    }
                },
            ],
            ["attribute" => "last_job_title_id",
                "value" => function ($model) {
                    if ($model->last_job_title_id) {
                        return JobTitle::findOne($model->last_job_title_id)->title;
                    }
                },
            ],

            ["attribute" => "skill",
                "value" => function ($model) {

                    $skills = Skill::findBySql("select skill.* from skill inner join customer_professional_experience_skills on skill_id=skill.id and customer_id=$model->id")->all();
                    $result = "";
                    if (count($skills)) {
                      $str= ArrayHelper::getModelAttribute($skills,"title");
                        $result .= implode(",", $str);
                    }
                    return $result;
                },
                "label" => Yii::t("app", "Skill")
            ],
            ["attribute" => "last_company_worked",
            ],
            ["attribute" => "knows_photovoltaic",
                "value" => function ($model) {
                    if ($model->knows_photovoltaic)
                        return Model::findBoolean($model->knows_photovoltaic);
                },
            ],
            ["attribute" => "knows_current",
                "value" => function ($model) {
                    if ($model->knows_photovoltaic)
                        return Model::findBoolean($model->knows_photovoltaic);
                },
            ],
            ["attribute" => "complete_interview",
                "value" => function ($model) {
                    if ($model->complete_interview)
                        return Model::findBoolean($model->complete_interview);
                },
            ],

            "date_interview",
            "date_biography_arrival",
            ["attribute" => "phone_communication",
                "value" => function ($model) {
                    if ($model->phone_communication)
                        return Model::findBoolean($model->phone_communication);
                },
            ],
            ["attribute" => "asking_job",
            ],
            ["attribute" => "comments",
            ],
            ["attribute" => "comments_2",
            ],
            ["attribute" => "comments_3",
            ],
            ["attribute" => "biography_file_id",
                "value" => function ($model) {
                    $result = "";
                    $models = File::findBySql("select file.* from file inner join customer_biography_file on biography_file_id=file.id and customer_id={$model->id}")->all();
                    if (count($models)) {
                        $str= ArrayHelper::getModelAttribute($models,"title");
                        $result .= implode("\n\n", $str);
                    }
                    return $result;

                },
                "format" => "raw",

            ],
            ["attribute" => "link",
                "value" => function ($model) {
                    $result = "";
                    $models = File::findBySql("select file.* from file inner join customer_biography_file on biography_file_id=file.id and customer_id={$model->id}")->all();
                    if (count($models)) {
                        $str= ArrayHelper::getModelAttribute($models,"fullFilePath");
                        $result .= implode("\n\n", $str);
                    }
                    return $result;

                },
                "label" => Yii::t("app", "Link"),

                "format" => "raw",

            ],

            'date_created',
            'date_updated',
        ];
    }


    public function getMenuWidget()
    {
        return ExportMenu::widget([
            'dataProvider' => $this->dataProvider,
            'columns' => $this->getColumns(),
            'clearBuffers' => true, //optional
            'dropdownOptions' => [
                'label' => Yii::t("app", 'Export All'),
                'class' => 'btn btn-outline-secondary btn-default'
            ],

            'clearBuffers' => true, //optional
        ]);
    }
}
