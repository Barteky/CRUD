<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kontakty */

$this->title = 'Create contact';
$this->params['breadcrumbs'][] = ['label' => 'Contact list', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kontakty-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
