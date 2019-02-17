<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Service;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ResultSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Results';
$this->params['breadcrumbs'][] = $this->title;
$service = new Service();
?>
<div class="result-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Result', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
              'label'=>'Ф.И.О.',
              'attribute' => 'id_user',
              'value' => 'userBond.fio',
            ],

            [
              'label' => 'Тест',
              'attribute' => 'id_quiz',
              'value' => 'quizBond.quiztitle',
            ],


            [
            'class' => 'yii\grid\ActionColumn',
            'header'=>'Действия',
            'headerOptions' => ['width' => '80'],
            'template' => '{view} {delete}{link}',
            ],
        ],
    ]); ?>
</div>
