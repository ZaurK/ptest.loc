<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Quiz;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="order-update col-md-6">
    <?= $form->field($model, 'ordertitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_quiz')->dropdownList(
    Quiz::find()->select(['quiztitle', 'id'])->indexBy('id')->column(),
    ['prompt'=>'Select Quiz']
    ) ?>
</div>
<div class="order-update col-md-6">
    <?= $form->field($model, 'order_data')->dropDownList($model->UserDropdown,
     [
      'multiple'=>'multiple',
      'class'=>'chosen-select input-md required form-control-multi',
      'size'=>20
     ]

    )->label("Users");
    ?>
</div>
<div class="order-update col-md-12">
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
