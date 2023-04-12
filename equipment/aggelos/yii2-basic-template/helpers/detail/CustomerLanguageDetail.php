<?php

namespace app\helpers\detail;


use app\models\generated\Customer;
use app\models\Model;
use Yii;

class CustomerLanguageDetail extends AbstractDetail
{
    public function __construct($customer)
    {
        parent::__construct("customer_language", "Foreign Languages");

        $this->model = \app\models\pure\CustomerLanguage::findOne($customer->id);
        $this->init();
    }

    public function setAttributes()
    {
        $this->attributes = ['english_diploma_id',
            'other_languages',
            'date_created',
            'date_updated',];

    }

    public function setValues()
    {
        $this->values =

            [
                ["attribute" => "english_diploma_id",
                    "value" => function ($model) {
                        return $model->englishDiploma->title;
                    },
                ],
                ["attribute" => "other_languages",
                    "value" => function ($model) {
                        return $model->other_languages;
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
