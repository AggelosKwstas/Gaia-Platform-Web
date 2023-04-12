<?php

namespace app\helpers\detail;


use app\models\generated\Customer;
use app\models\Model;
use Yii;

class CustomerDetail extends AbstractDetail
{
    public function __construct($customer)
    {
        parent::__construct("customer", "Profile");
        $this->active = true;
        $this->model = $customer;
        $this->init();
    }

    public function setAttributes()
    {
        $this->attributes = ['id',
            'email',
            'firstname',
            'lastname',
            'date_born',
            'family_status_id',
            'home_phone',
            'phone',
            'county_residence_id',
            'city_residence',
            'gender_id',
            'car_diploma_id',
            'military_duties',
            'field1',
            'field2',
            'field3',
            'date_created',
            'date_updated',];

    }

    public function setValues()
    {
        $this->values =

            ['id',
                ["attribute" => "email",
                    "value" => function ($model) {
                        return $model->email;
                    },
                    "format" => "email"],
                'firstname',
                'lastname',
                'date_born',
                ["attribute" => "family_status_id",
                    "value" => function ($model) {
                        if ($model->family_status_id)
                            return $model->familyStatus->prettyName;
                    }],
                'home_phone',
                'phone',
                ["attribute" => 'county_residence',
                    "value" => function ($model) {
                        if ($model->county_residence_id)
                            return $model->countyResidence->prettyName;
                    }],
                'city_residence',
                ["attribute" => "gender_id",
                    "value" => function ($model) {

                        if ($model->gender_id)
                            return $model->gender->pretty_name;
                    }],
                ["attribute" => "car_diploma_id",
                    "value" => function ($model) {
                        if ($model->car_diploma_id)
                            return $model->carDiploma->prettyName;
                    }],
                ["attribute" => "military_duties",
                    "value" => function ($model) {
                        return Model::findBooleanNA($model->military_duties);
                    }],
                'field1',
                'field2',
                'field3',
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
