<?php

use yii\helpers\Html;
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

    <?= $form->field($model, 'page_num')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
