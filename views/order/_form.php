<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Quiz;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form col-md-6">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ordertitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_quiz')->dropdownList(
    Quiz::find()->select(['quiztitle', 'id'])->indexBy('id')->column(),
    ['prompt'=>'Select Quiz']
    ) ?>

    <?= $form->field($model, 'order_data')->dropDownList($model->UserDropdown,
     [
      'multiple'=>'multiple',
      'class'=>'chosen-select input-md required form-control-multi',
      'size'=>10
     ]

    )->label("Users");
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
