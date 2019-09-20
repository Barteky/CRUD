<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\KontaktySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contact list';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kontakty-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create contact', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nazwisko',
            'imie',
            'adres',
            'telefon',
            'email:email',
            //'wlasciciel',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
