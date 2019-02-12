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
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
  </head>

  <body class="fonimg">
  <?php $this->beginBody() ?>
  <?php
    $identity = Yii::$app->user->getIdentity();
    //echo "<pre>";
    //print_r($identity['id']);
    ?>
  <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse1 navbar-fixed-top',
            ],
        ]);

        $menuItems = [
                    ['label' => 'Главная', 'url' => ['/site/index']],
                    ['label' => 'Contact', 'url' => ['/site/contact']],
                ];


        if ((Yii::$app->user->getIdentity())['role'] == '20') {
                    $menuItems[] = ['label' => 'Тесты', 'url' => ['/quiz/index']];
                    $menuItems[] = ['label' => 'Пользователи', 'url' => ['/user/index']];
                    $menuItems[] = ['label' => 'Задания', 'url' => ['/order/index']];
                    $menuItems[] = ['label' => 'Результаты', 'url' => ['/result/index']];
                    // $menuItems[] = ['label' => 'Аккаунт', 'url' => ['/account/index']];
                }
        else if ((Yii::$app->user->getIdentity())['role'] == '10') {
                    // $menuItems[] = ['label' => 'Тесты', 'url' => ['/quiz/index']];
                    // $menuItems[] = ['label' => 'Пользователи', 'url' => ['/user/index']];
                    // $menuItems[] = ['label' => 'Задания', 'url' => ['/order/index']];
                    // $menuItems[] = ['label' => 'Результаты', 'url' => ['/result/index']];
                    $menuItems[] = ['label' => 'Аккаунт', 'url' => ['/account/index']];
                }

        if (Yii::$app->user->isGuest) {
                    $menuItems[] = ['label' => 'Вход', 'url' => ['/site/login']];
                } else {
                    $menuItems[] = [
                        'label' => 'Выход (' . Yii::$app->user->identity->username . ')',
                        'url' => ['/site/logout'],
                        'linkOptions' => ['data-method' => 'post']
                    ];
                }

        echo Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-right'],
                    'items' => $menuItems,
                        ]);
        NavBar::end();
        ?>
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
