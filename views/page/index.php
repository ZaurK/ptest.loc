<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Page;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Страницы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать новую', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'id_parent',
            'page_title',
            'parent.page_title',
           [
               'attribute'=>'page.page_title',
               'label'=>'Родитель',
           ],
       [
           'attribute'=>'id_parent',
           'label'=>'Родительская категория',

       ],
           [
             'attribute' => 'access',
             'label'=>'Доступ',
             'filter'=>array("0"=>"Видно всем", "1"=>"Только админ", "2"=>"Только студент"),
           ],

            //'page_content:ntext',
            [
              'attribute' => 'page_num',
              'headerOptions' => ['width' => '100'],
            ],

            [
            'class' => 'yii\grid\ActionColumn',
            'header'=>'Действия',
            'headerOptions' => ['width' => '10'],
            'template' => '{update} {delete}{link}',
            ],
        ],
    ]); ?>
</div>
