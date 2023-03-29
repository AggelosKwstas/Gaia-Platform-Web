<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class MyAsset extends AssetBundle
{
    public $basePath = '@webroot';

    public $baseUrl = '@web';

    public $css = [
        'theme/font-awesome/css/all.css',
        'css/login.css',
        'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
        'https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap',
        'https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap',
        'https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap',
        'https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap',
    ];

    public $js = [
        'theme/font-awesome/js/all.js',
        'js/jquery.min.js',
        'js/popper.js',
        'js/bootstrap.min.js',
        'js/main.js'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];
}
