<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Account';
$this->params['breadcrumbs'][] = $this->title ;
$this->params['breadcrumbs'][] = Yii::$app->user->identity->fio ;
?>


<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <h3>Мои тесты:</h3>


    <table class="table table-bordered table-responsive table-hover">
        <thead>
          <tr>
            <th>Тестовое задание</th>
            <th>Статус</th>
          </tr>
        </thead>
        <tbody>
          <?php
              foreach ($orders as $order){
                  echo '<tr>' .$order. '</tr>';
              }

          ?>
        </tbody>
      </table>

</div>
