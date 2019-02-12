<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Page;

/* @var $this yii\web\View */
/* @var $model app\models\Page */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'id_parent')->textInput() ?> -->

    <?php
    $pages = ArrayHelper::map(Page::find()->all(), 'id', 'page_title');
    echo $form->field($model, 'id_parent')->dropDownList($pages, ['prompt' => 'Без родителя']);
    ?>

    <?= $form->field($model, 'page_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'page_content')->textarea(['rows' => 6]) ?>
    <?= \vova07\imperavi\Widget::widget([
    'selector' => '#page-page_content',
    'settings' => [
        'lang' => 'ru',
        'minHeight' => 200,
        'imageUpload' => Url::to(['default/image-upload']),
        'imageManagerJson' => Url::to(['/default/images-get']),
        'fileUpload' => Url::to(['default/file-upload']),
        'fileManagerJson' => Url::to(['/default/files-get']),
        'plugins' => [
            'imagemanager',
            'table',
            'clips',
            'fullscreen',
        ],
        'clips' => [
            ['Lorem ipsum...', 'Lorem...'],
            ['red', '<span class="label-red">red</span>'],
            ['green', '<span class="label-green">green</span>'],
            ['blue', '<span class="label-blue">blue</span>'],
        ],
      ],
    ]);
    ?>

    <?= $form->field($model, 'page_num')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
