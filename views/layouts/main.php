<?php

use yii\helpers\Html;

?>

<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/><?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <header>Моя компания</header>
        <?= $content ?>
        <footer>Моя компания &copy; 2014</footer>
        <?php $this->endBody() ?>
    </body>
</html>

<?php $this->endPage() ?>

