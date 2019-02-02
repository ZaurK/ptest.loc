<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Account';
$this->params['breadcrumbs'][] = $this->title ;
$this->params['breadcrumbs'][] = Yii::$app->user->identity->fio ;
?>


<div class="site-about">
    <h1><?= Html::encode($quiz_model['quiztitle']) ?></h1>

    <h3>Задание:</h3>

    <?php

    echo $quiz_model['quiz_data'];
    ?>



</div>
