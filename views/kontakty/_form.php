<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kontakty */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kontakty-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'imie')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nazwisko')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefon')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
