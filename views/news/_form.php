<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'new_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'new_content')->textarea(['rows' => 6]) ?>
    <?= \vova07\imperavi\Widget::widget([
    'selector' => '#news-new_content',
    'settings' => [
        'lang' => 'ru',
        'minHeight' => 200,
        'imageUpload' => Url::to(['default/image-upload']),
        'imageManagerJson' => Url::to(['/default/images-get']),
        'imageDelete' => Url::to(['/default/file-delete']),
        'fileManagerJson' => Url::to(['/default/files-get']),
        'fileUpload' => Url::to(['default/file-upload']),
        'plugins' => [
            'imagemanager',
            'table',
            'video',
            'clips',
            'fontcolor',
            'fullscreen',
            'imagemanager' => 'vova07\imperavi\bundles\ImageManagerAsset',
            'filemanager' => 'vova07\imperavi\bundles\FileManagerAsset',
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

    <!-- <?= $form->field($model, 'created_at')->textInput(['maxlength' => true]) ?> -->



    <?= $form->field($model, 'created_at')->widget(DatePicker::className(), [
      'dateFormat' => 'php:d/m/Y',
      'options'=>['style'=>'width:250px;', 'class'=>'form-control','readOnly'=>'readOnly', 'placeholder'=>'Выберите дату.']
  ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
