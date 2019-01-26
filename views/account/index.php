<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Account';
$this->params['breadcrumbs'][] = $this->title ;
$this->params['breadcrumbs'][] = Yii::$app->user->identity->fio ;
?>

<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>
    <?php
    //echo "<pre>";
    //print_r($sess);
    ?>

    <code><?= __FILE__ ?></code>
</div>
