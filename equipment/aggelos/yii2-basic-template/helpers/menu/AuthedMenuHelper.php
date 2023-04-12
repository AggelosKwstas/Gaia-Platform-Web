<?php

namespace app\helpers\menu;


use yii\widgets\Menu;

class AuthedMenuHelper extends MenuHelper
{


    public function getMenu(): array
    {
        $menu = [];
        $menu["site"] = [["controller" => "dashboard", "link" => \yii\helpers\Url::to(["dashboard/index"]), 'name' => "Dashboard"]];
        $menu["menu"] = [["controller" => "activity", "link" => \yii\helpers\Url::to(["activity/index"]), 'name' => "Activity"],
            ["controller" => "data-files", "link" => \yii\helpers\Url::to(["data-files/index"]), 'name' => "Data Files"],

            ["controller" => "image", "link" => \yii\helpers\Url::to(["image/index"]), 'name' => "Image"],
            ["controller" => "country", "link" => \yii\helpers\Url::to(["country/index"]), 'name' => "Countries"],
            ["controller" => "participant", "link" => \yii\helpers\Url::to(["participant/index"]), 'name' => "Participants"],
            ["controller" => "user", "link" => \yii\helpers\Url::to(["user/index"]), 'name' => "Users"],
        ];
        $menu["graphs"] = [["controller" => "graphs", "link" => \yii\helpers\Url::to(["graphs/index"]), 'name' => "Graphs"]];
//        $menu["transactions"] = [["controller" => "transaction", "link" => \yii\helpers\Url::to(["transaction/index"]), 'name' => "Transaction"]];
//        $menu["secondary"] = [
//            ["controller" => "car-diploma", "name" => "Car Diplomas"],
//            ["controller" => "user", "name" => "Users",  "link" => \yii\helpers\Url::to(["user/index"])],
//
//
//
//        ];

        return $menu;
    }


}