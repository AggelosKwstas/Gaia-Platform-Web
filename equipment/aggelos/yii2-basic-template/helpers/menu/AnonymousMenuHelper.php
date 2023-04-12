<?php

namespace app\helpers\menu;


use yii\widgets\Menu;

class AnonymousMenuHelper extends MenuHelper
{


    public function getMenu(): array
    {
        $menu = [];
        $menu["site"] = [["controller" => "site", "link" => \yii\helpers\Url::to(["site/index"]), 'name' => "Index"]];
        $menu["items"] = [["controller" => "graphs", "link" => \yii\helpers\Url::to(["graphs/index"]), 'name' => "Graphs"]];



        return $menu;
    }



}