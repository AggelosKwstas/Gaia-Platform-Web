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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';

    public $baseUrl = '@web';

    public $css = [
        'https://unpkg.com/leaflet@1.9.3/dist/leaflet.css',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css',
        'theme/font-awesome/css/all.css',
        'theme\Highcharts-11.0.0\code\css\highcharts.css',
        'https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap',
        'https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap',
        'https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap',
        'css/styles.css',
        'css/graphs.css',
        'css/cloud.css',
        'css/screenTypeFix.css',
        'css/popupLoader.css',
        'css/tooltip.css',
        'css/modal.css',
        'css/mapElements.css',
        'css/contactUs.css',
        'css/loader.css',
        'css/gaugeHighcharts.css',
        'css/lineChartHighcharts.css',
        'css/batteryLevel.css',
        'css/pillCards.css',
        'https://unpkg.com/aos@2.3.1/dist/aos.css'

    ];

    public $js = [
        'theme/font-awesome/js/all.js',
        'theme/Highcharts-11.0.0/code/highcharts.js',
        'theme/Highcharts-11.0.0/code/highcharts-more.js',
//        'theme/Highcharts-11.0.0/code/exporting.js',
        'theme/Highcharts-11.0.0/code/modules/solid-gauge.js',
        'https://cdn.jsdelivr.net/momentjs/latest/moment.min.js',
        'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js',

        'js/graphs.js',
        'https://unpkg.com/leaflet@1.9.3/dist/leaflet.js',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js',
        'js/downloadCloud.js',
        'js/map_fullscreen.js',
        'https://unpkg.com/aos@2.3.1/dist/aos.js'

    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];

}