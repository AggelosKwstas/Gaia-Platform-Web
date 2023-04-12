<?php

namespace app\helpers\detail;

use yii\helpers\ArrayHelper;
use yii\widgets\DetailView;

abstract class AbstractDetail
{

    public $label;
    public $name;
    public $models = [];
    public $attributes = [];
    public $labels = [];
    public $values = [];
    public $model = null;
    public $active = false;

    public function __construct($name, $label)
    {

        $this->name = $name;
        $this->label = $label;

    }

    public function init()
    {

        if ($this->model || count($this->models)) {
            $this->setAttributes();
            $this->setLabels();
            $this->setValues();
            if (!count($this->labels)) {
                foreach ($this->attributes as $attribute) {
                    if ($this->model)
                        $this->labels[] = $this->model->getAttributeLabel($attribute);
                    else if (count($this->models)) {
                        $this->labels[] = $this->models[0]->getAttributeLabel($attribute);
                    }
                }
            }
            $this->mergeLabelsIntoValues();
        }


    }

    public function mergeLabelsIntoValues()
    {
        $result = [];
        $index = 0;
        foreach ($this->values as $value) {
            $label = $this->labels[$index];

            if (gettype($value) == "string") {
                $result[] = ["attribute" => $value,
                    "label" => $label,
                ];

            } else if (isset($value["label"])) {
                $result[] = $value;
            } else {
                $result[] = ArrayHelper::merge($value, [
                    ["label" => $label]
                ]);
            }

            $index++;

        }


//        var_dump($result);
        $this->values = $result;
    }

    public function setAttributes()
    {

    }

    public function setValues()
    {

    }

    public function setLabels()
    {

    }

    private function getDetailView($model)
    {


        return DetailView::widget([
            'model' => $model,
            'attributes' => $this->values,
        ]);

    }


    private function getTable()
    {
        if ($this->model)
            return $this->getDetailView($this->model);
        $length = count($this->models);
        if ($length) {

            $col = "col-4";
            if ($length === 1)
                $col = "col-12";
            else if ($length === 2)
                $col = "col-6";


            $result = "<div class='row'>";
            foreach ($this->models as $model)
                $result .= "<div class='$col'>" . $this->getDetailView($model) . "</div>";
            $result .= "</div>";
            return $result;


        }
        return null;
    }

    public function getWidget()
    {
        $active = "";
        if ($this->active)
            $active = "show";
        $checkButton = "";
        if ($this->model || count($this->models))
            $checkButton='<i class="fa fa-check color-white"></i>';
        $result = " 
 <div class='card-header purple-color mt-3' id='heading{$this->name} '>
           
                    <a class='btn text-center text-white w-100 text-left'  data-toggle='collapse' href='#collapse{$this->name}'>
                      " . \Yii::t("app", $this->label) . "   $checkButton
                    </a>
              
            </div>
                    <div id='collapse{$this->name}' class='collapse  $active'>
    <div class='card-body'>
     " . $this->getTable() . "
                </div>
            </div>";
        return $result;

    }


}
