<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kontakty */

$this->title = 'Update contact: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Contact', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kontakty-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
