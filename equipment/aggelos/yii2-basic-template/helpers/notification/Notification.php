<?php
namespace app\helpers\notification;
class   Notification{


public $model;
public $text;


public function __construct($model,$text)
{

    $this->model=$model;
    $this->text = $text;
}


}
