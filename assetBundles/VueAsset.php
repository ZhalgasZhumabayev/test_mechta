<?php

namespace app\modules\myModule\assetBundles;

use yii\web\AssetBundle;

class VueAsset extends AssetBundle
{
    public $publishOptions = ['forceCopy' => true];
    public $sourcePath = '@my-module/assets/js/main';
    public $baseUrl = '@web';

    public function init()
    {
        parent::init();

        $this->js[] = YII_ENV === 'dev' ? 'app.js' : 'app.min.js';
    }

}