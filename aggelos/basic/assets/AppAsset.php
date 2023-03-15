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
        'vendor/fontawesome-free/css/all.min.css',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css',
        'https://fonts.gstatic.com',
        'theme/font-awesome/css/all.css',
        'https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap',
        'https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap',
        'https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap',
        'css/styles.css',
        'css/downloadButton.css'
    ];

    public $js = [
        'theme/font-awesome/js/all.js',
        'https://unpkg.com/leaflet@1.9.3/dist/leaflet.js',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js',
        'https://cdn.startbootstrap.com/sb-forms-latest.js',
        'js/scripts.js',
        'js/map_overview.js'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];
}
