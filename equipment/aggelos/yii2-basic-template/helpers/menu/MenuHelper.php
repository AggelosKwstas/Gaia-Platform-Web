<?php

namespace app\helpers\menu;

use Yii;

abstract class MenuHelper
{

    public $menu = [];
    public $_untouched_menu = [];
    public $controller = null;
    public $action = null;

    public function __construct()
    {

        $this->controller = Yii::$app->controller->getUniqueId();
        $this->action = Yii::$app->controller->action->id;
        $this->init();


    }

    public function init()
    {
        $this->_untouched_menu = $this->getMenu();
        $this->menu = $this->_fix_menu($this->_untouched_menu);
        return $this->menu;

    }


    public function getArrangement(): array
    {
        return [];
    }

    public function getMenu(): array
    {
        return [];
    }

    public function _fix_menu($menu)
    {
        $result = [];
        foreach ($menu as $menu_key => $single_menu) {
            $result[$menu_key] = [];
            foreach ($single_menu as $key => $m) {
                $result[$menu_key][$key] = $m;
                if (!isset($m["link"])) {

                    // $result[$menu_key][$key]["controller"] = "all/" . $m["controller"];

                    $result[$menu_key][$key]["link"] = \yii\helpers\Url::to(["all/" . $m["controller"] . "/index"]);
                }
                if (isset($m["name"])) {
                    $result[$menu_key][$key]["name"] = Yii::t("app", $m["name"]);
                }
            }
        }

        return $result;
    }


    public function getVisualizedMenuTheme()
    {
        $active = "kt-menu__item--here";

        $result = " <ul class='kt-menu__nav '>";
        $isActive = false;

        $count = 0;

        foreach ($this->menu as $menu_key => $single_menu) {
            $isActiveParent = false;
            $only_one_view = count($single_menu) === 1;

            $str = '';

            foreach ($single_menu as $d) {
                $isActive=false;

                $controller = $d["controller"];
                $name = $d["name"];
                $link = $d["link"];
                $sub_menu = false;


                if ($this->controller == $controller) {
                    $isActiveParent=$isActive = $active;


                }

                if ($only_one_view) {
                    //str for single menu item
                    $str .= "<li class='kt-menu__item $isActive kt-menu__item--submenu kt-menu__item--rel'
                            data-ktmenu-submenu-toggle='hover' aria-haspopup='true'><a
                                    href='$link'
                                    class='kt-menu__link'><span
                                        class='kt-menu__link-text'>$name</span><i class='kt-menu__ver-arrow la la-angle-right'></i></a>

                              </li>";
                    break;

                }


                if ($count % 10 == 0) {
                    $str .= '<li class="kt-menu__item "><h3 class="kt-menu__heading kt-menu__toggle"></h3><ul class="kt-menu__inner">';
                    $sub_menu = true;

                }
                $count++;


                $str .= '<li class="kt-menu__item ' . $isActive . '" aria-haspopup="true"><a
                                                href="' . $link . '"
                                                class="kt-menu__link "><i
                                                    class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                                    class="kt-menu__link-text">' . $name . '</a>
                                    </li>';
                if ($count % 10 == 0) {
                    $str .= '</ul></li>';

                }
            }

            if ($only_one_view) {
                $result .= $str;
            } else {


                $multiple_menu = "<li class='kt-menu__item  $isActiveParent  kt-menu__item--submenu kt-menu__item--rel kt-menu__item--open-dropdown kt-menu__item--click'
                            data-ktmenu-submenu-toggle='click' aria-haspopup='true'><a href='javascript:;'
                                                                                       class='kt-menu__link kt-menu__toggle'><span
                                    class='kt-menu__link-text'>" . Yii::t('app', $menu_key) . "</span><i
    class='kt-menu__hor-arrow la la-angle-down'></i><i
    class='kt-menu__ver-arrow la la-angle-right'></i></a>
<div class='kt-menu__submenu  kt-menu__submenu--fixed kt-menu__submenu--center'
     style='width:600px'>
    <div class='kt-menu__subnav'>
        <ul class='kt-menu__content'>
        $str
        </ul>
    </div>
</div>
</li>";
                $result .= $multiple_menu;
            }
        }
        $result .= '</ul>';

        return $result;

    }


}