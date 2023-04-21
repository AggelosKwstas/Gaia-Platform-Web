<?php

namespace app\helpers\Override;

use kartik\select2\Select2;
use Yii;
use yii\helpers\Html;


class ActiveField extends \yii\widgets\ActiveField
{


    /**
     * Renders a drop-down list.
     * The selection of the drop-down list is taken from the value of the model attribute.
     * @param array $items the option data items. The array keys are option values, and the array values
     * are the corresponding option labels. The array can also be nested (i.e. some array values are arrays too).
     * For each sub-array, an option group will be generated whose label is the key associated with the sub-array.
     * If you have a list of data models, you may convert them into the format described above using
     * [[ArrayHelper::map()]].
     *
     * Note, the values and labels will be automatically HTML-encoded by this method, and the blank spaces in
     * the labels will also be HTML-encoded.
     * @param array $options the tag options in terms of name-value pairs.
     *
     * For the list of available options please refer to the `$options` parameter of [[\yii\helpers\Html::activeDropDownList()]].
     *
     * If you set a custom `id` for the input element, you may need to adjust the [[$selectors]] accordingly.
     *
     * @return \yii\widgets\ActiveField the field object itself.
     */
    public function select2($items, $original_options = [])
    {
        $options = array_merge($this->inputOptions, $original_options);

        if ($this->form->validationStateOn === ActiveForm::VALIDATION_STATE_ON_INPUT) {
            $this->addErrorClassIfNeeded($options);
        }

        $this->addAriaAttributes($options);
        $this->adjustLabelFor($options);
        $this->parts['{input}'] = Html::activeDropDownList($this->model, $this->attribute, $items, $options);
        $prompt = null;
        if (isset($options["prompt"]) && $options["prompt"]) {
            $prompt = Yii::t("app", $options["prompt"]);
        }

        $multiple = isset($options["multiple"]) && $options["multiple"];
        $value = isset($options["value"]) && $options["value"];

        if (!$value) {
            $value = $this->model[$this->attribute];
        }


        $array_options = ArrayHelper::merge($original_options, [
                "data" => $items,
                "value" => $value,

                'options' => ['placeholder' => Yii::t("app", $prompt ? $prompt : "Select"), "multiple" => $multiple],
                'pluginOptions' => [
                    'allowClear' => !!$prompt
                ]]
        );




        try {
            return $this->form->field($this->model, $this->attribute)->widget(Select2::classname(),$array_options);
        } catch (\Exception $e) {

            var_dump($e);

            return null;

        }
    }


    /**
     * Renders a drop-down list.
     * The selection of the drop-down list is taken from the value of the model attribute.
     * @param array $items the option data items. The array keys are option values, and the array values
     * are the corresponding option labels. The array can also be nested (i.e. some array values are arrays too).
     * For each sub-array, an option group will be generated whose label is the key associated with the sub-array.
     * If you have a list of data models, you may convert them into the format described above using
     * [[ArrayHelper::map()]].
     *
     * Note, the values and labels will be automatically HTML-encoded by this method, and the blank spaces in
     * the labels will also be HTML-encoded.
     * @param array $options the tag options in terms of name-value pairs.
     *
     * For the list of available options please refer to the `$options` parameter of [[\yii\helpers\Html::activeDropDownList()]].
     *
     * If you set a custom `id` for the input element, you may need to adjust the [[$selectors]] accordingly.
     *
     * @return \yii\widgets\ActiveField the field object itself.
     */
    public function booleanDropDownList($options = [])
    {

        $items = ["yes" => Yii::t("app", "Yes"),
            "no" => Yii::t("app", "No"),
        ];
        $options = array_merge($this->inputOptions, $options);

        if ($this->form->validationStateOn === ActiveForm::VALIDATION_STATE_ON_INPUT) {
            $this->addErrorClassIfNeeded($options);
        }

        $this->addAriaAttributes($options);
        $this->adjustLabelFor($options);
        $this->parts['{input}'] = Html::activeDropDownList($this->model, $this->attribute, $items, $options);

        return $this;
    }
}
