<?php

namespace app\helpers\detail;


use app\models\generated\Customer;
use app\models\Model;
use app\models\pure\File;
use Yii;
use yii\helpers\Html;

class CustomerInterviewDetail extends AbstractDetail
{
    public function __construct($customer)
    {
        parent::__construct("customer_interview", "Interview");

        $this->model = \app\models\pure\CustomerInterview::findOne($customer->id);
        $this->init();
    }

    public function setAttributes()
    {
        $this->attributes = [
            'complete_interview',
            "date_interview",
            "date_biography_arrival",


            'phone_communication',
            'asking_job',
            'comments',
            'comments_2',
            'comments_3',
            'biography_file_id',
            'date_created',
            'date_updated'];

    }

    public function setValues()
    {
        $this->values =

            [["attribute" => "complete_interview",
                "value" => function ($model) {
                    return Model::findBoolean($model->complete_interview);
                }],
                "date_interview",
                "date_biography_arrival",
                ["attribute" => "phone_communication",
                    "value" => function ($model) {
                        return Model::findBoolean($model->phone_communication);
                    }],

                'asking_job',
                'comments',
                'comments_2',
                'comments_3',

                ["attribute" => "biography_file_id",
                    "value" => function ($model) {
                        $result = "";
                        $models = File::findBySql("select [file].* from [file] inner join customer_biography_file on biography_file_id=[file].id and customer_id={$model->customer_id}")->all();
                        if (count($models)) {


                            $result = "<div class='row'><ul>";
                            foreach ($models as $file) {


                                $result .= "<li>" . Html::a($file->title, $file->getFullFilePath()) . "</li>";
                            }
                            $result .= "</ul></div>";
                        }
                        return $result;

                    },
                    "label" => Yii::t("app", "Biography File"),
                    "format" => "raw"],

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
