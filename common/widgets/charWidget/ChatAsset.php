<?php

namespace common\widgets\chatWidget;
use backend\assets\AppAsset;
use yii\web\AssetBundle;
class ChatAsset extends AssetBundle
{
    public $sourcePath = (__DIR__ . '/assets');
    public $js = ['js/chat.js'];
    public $css = ['css/chat.css'];
    public $depends = [
        AppAsset::class
    ];
}
