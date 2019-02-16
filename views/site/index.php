<?php

use app\models\News;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">
                  <?= News::getNews() ?>
    </div>
</div>
