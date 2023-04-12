<?php

namespace app\helpers\detail;


use app\models\generated\Customer;
use app\models\Model;
use Yii;

class CustomerComputerSkills extends AbstractDetail
{
    public function __construct($customer)
    {
        parent::__construct("customer_computer_skills", "Computer Skills");

        $this->model = \app\models\pure\CustomerComputerSkills::findOne($customer->id);
        $this->init();
    }

    public function setAttributes()
    {
        $this->attributes = [
            'pc_general_knowledge_id',
            'pc_autocad_id',
            'pc_pvsyst_id',
            'pc_erp_id',
            'field1',
            'field2',
            'field3',
            'date_created',
            'date_updated',];

    }

    public function setValues()
    {
        $this->values =

            [
                ["attribute" => "pc_general_knowledge_id",
                    "value" => function ($model) {
                        return $model->pcGeneralKnowledge->title;
                    },
                ],
                ["attribute" => "pc_autocad_id",
                    "value" => function ($model) {
                        return $model->pcAutocad->title;
                    },
                ],
                ["attribute" => "pc_pvsyst_id",
                    "value" => function ($model) {
                        return $model->pcPvsyst->title;
                    },
                ],
                ["attribute" => "pc_erp",
                    "value" => function ($model) {
                        return $model->pcErp->title;
                    },
                ],
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
