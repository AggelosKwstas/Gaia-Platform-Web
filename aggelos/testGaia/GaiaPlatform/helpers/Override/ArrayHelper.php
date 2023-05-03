<?php

namespace app\helpers\Override;

class ArrayHelper extends \yii\helpers\ArrayHelper
{


    /**
     * @throws \Exception
     */
    public static function getModelAttribute($array, $attribute)
    {
        $result = [];
        if (isset($array) && is_array($array))
            foreach ($array as $model) {
                $value = static::getValue($model, $attribute);

                $result[] = $value;
            }
        return $result;
    }


}
