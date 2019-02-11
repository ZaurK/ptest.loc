<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
  <head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
  </head>

  <body class="fonimg">
  <?php $this->beginBody() ?>
  <div class="wrap-login">
    <div class="container">
      <?= Alert::widget() ?>
          <?= $content ?>
    </div> <!-- /container -->
  </div>


  <footer class="footer-login">
      <div class="container">
          <p style="color:#fff;" class="pull-left">&copy; <?= date('Y') ?> КАБАРДИНО-БАЛКАРСКАЯ ПРОТИВОПОЖАРНО-СПАСАТЕЛЬНАЯ СЛУЖБА</p>

          <p class="pull-right"><a href="http://kbfrs.ru" target="_blank">Основной сайт службы</a></p>
      </div>
  </footer>

  <?php $this->endBody() ?>
  </body>
</html>
<?php $this->endPage() ?>
