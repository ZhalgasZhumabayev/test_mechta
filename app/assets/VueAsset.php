<?php

namespace app\assets;

use yii\web\AssetBundle;

class VueAsset extends AssetBundle
{
    public $publishOptions = ['forceCopy' => true];
    public $sourcePath = '@app/assets/js/main/';
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public function init()
    {
        parent::init();

        $this->js[] = YII_ENV === 'dev' ? 'app.js' : 'app.min.js';
    }

}