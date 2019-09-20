<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KontaktySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kontakty-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'imie') ?>

    <?= $form->field($model, 'nazwisko') ?>

    <?= $form->field($model, 'adres') ?>

    <?= $form->field($model, 'telefon') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'wlasciciel') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
