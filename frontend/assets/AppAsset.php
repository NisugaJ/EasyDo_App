<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/index.css',
        'css/login.css',
        'css/note.css',
    ];
    public $js = [
        'js/site.js',
        'js/index.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\web\JqueryAsset',
        'yii\jui\JuiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
