<?php
   /* @var $this \yii\web\View */
   /* @var $content string */
   use yii\helpers\Html;
   use App\Assets\VueAsset;

   VueAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang = "<?= Yii::$app->language ?>">
   <head>
        <meta charset = "<?= Yii::$app->charset ?>">
        <meta name = "viewport" content = "width = device-width, initial-scale = 1"><?= Html::csrfMetaTags() ?>
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
        <link href="../css/main.css" rel="stylesheet" />
       <script src="https://unpkg.com/vue"></script>
       <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
   </head>

   <body>
        <?php $this->beginBody() ?>

        <div class="wrap">

            <div id="app">
                Загрузка...
                <?= $content ?>
            </div>
        </div>

        <header>
            <span class="v3_149">FastService</span>
            <div class="v3_150">
                <img src="../images/logo.svg" alt="">
            </div>
        </header>

        <footer>
            <div class="v3_139">
                <div class="v3_298"></div>
                <div class="v3_141">
                    <div class="v3_142"></div>
                    <div class="v3_143"></div>
                    <div class="v3_144"></div>
                    <div class="v3_145"></div>
                </div>
                <span class="v3_146">All rights reserved Fast service 2021</span>
            </div>
        </footer>

      <?php $this->endBody() ?>
   </body>
</html>
<?php $this->endPage() ?>