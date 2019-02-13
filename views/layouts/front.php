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
<body>
<?php $this->beginBody() ?>
<?php $this->registerJsFile('/js/parallax.js', ['depends' => [\yii\web\JqueryAsset::className()]]); ?>
  <?php
    $identity = Yii::$app->user->getIdentity();
    //echo "<pre>";
    //print_r($identity['id']);
    ?>
    <div class="jumbotron" id="firemancontainer">
      <img src= <?=Yii::getAlias('@web') ?>"/img/fireman.png">
        <div class="container text-left">
          <div class="col-md-6">
          <h2>Чему учится пожарный?</h2>
          <p>В приоритете у пожарных не ликвидация возгораний, а спасение людей. При необходимости пожарные оказывают первую медицинскую помощь, а иногда и снимают кошек с деревьев.</p>
          <p><a class="btn btn-primary btn-lg" role="button">Учиться »</a></p>
        </div>
        </div>
      </div>
<div class="wrap-front">

    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-fixed-top',
        ],
    ]);

    $menuItems = [
                ['label' => 'Главная', 'url' => ['/site/index']],
                // ['label' => 'Contact', 'url' => ['/site/contact']],

            ];


    // if ((Yii::$app->user->getIdentity())['role'] == '20') {
    //             $menuItems[] = ['label' => 'Тесты', 'url' => ['/quiz/index']];
    //             $menuItems[] = ['label' => 'Пользователи', 'url' => ['/user/index']];
    //             $menuItems[] = ['label' => 'Задания', 'url' => ['/order/index']];
    //             $menuItems[] = ['label' => 'Результаты', 'url' => ['/result/index']];
    //             // $menuItems[] = ['label' => 'Аккаунт', 'url' => ['/account/index']];
    //         }
    // else
    if ((Yii::$app->user->getIdentity())['role'] == '10') {
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
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

        <?= Alert::widget() ?>

        <div class="col-md-9">
            <?= $content ?>
        </div>
        <div class="col-md-3">

  <div class="accordion js-accordion">
  <div class="accordion__item js-accordion-item">
    <div class="accordion-header js-accordion-header">Panel 1</div>
  <div class="accordion-body js-accordion-body">

      <div class="accordion js-accordion">
        <div class="accordion__item js-accordion-item">
           <div class="accordion-header js-accordion-header">Sub Panel 1</div>

        </div><!-- end of sub accordion item -->
        <div class="accordion__item js-accordion-item">
           <div class="accordion-header js-accordion-header">Sub Panel 2</div>

        </div><!-- end of sub accordion item -->
      </div><!-- end of sub accordion -->
    </div
    </div><!-- end of accordion body -->
  </div><!-- end of accordion item -->
  <div class="accordion__item js-accordion-item ">
    <div class="accordion-header js-accordion-header">Panel 2</div>
  <div class="accordion-body js-accordion-body">

      <div class="accordion js-accordion">
        <div class="accordion__item js-accordion-item">
           <div class="accordion-header js-accordion-header">Sub Panel 1</div>

        </div><!-- end of sub accordion item -->
        <div class="accordion__item js-accordion-item">
           <div class="accordion-header js-accordion-header">Sub Panel 2</div>

        </div><!-- end of sub accordion item -->
      </div><!-- end of sub accordion -->
    </div><!-- end of accordion body -->
  </div><!-- end of accordion item -->
    <div class="accordion__item js-accordion-item">
    <div class="accordion-header js-accordion-header">Panel 3</div>
  <div class="accordion-body js-accordion-body">

      <div class="accordion js-accordion">
        <div class="accordion__item js-accordion-item">
           <div class="accordion-header js-accordion-header">Sub Panel 1</div>

        </div><!-- end of sub accordion item -->
        <div class="accordion__item js-accordion-item">
           <div class="accordion-header js-accordion-header">Sub Panel 2</div>

        </div><!-- end of sub accordion item -->
      </div><!-- end of sub accordion -->
    </div><!-- end of accordion body -->
  </div><!-- end of accordion item -->
     <div class="accordion__item js-accordion-item">
    <div class="accordion-header js-accordion-header">Panel 4</div>

  </div><!-- end of accordion item -->


</div><!-- end of accordion -->

        </div>
    </div>

</div>
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= date('Y') ?> КАБАРДИНО-БАЛКАРСКАЯ ПРОТИВОПОЖАРНО-СПАСАТЕЛЬНАЯ СЛУЖБА</p>

        <p class="pull-right"><a href="http://kbfrs.ru" target="_blank">Основной сайт службы</a></p>
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
