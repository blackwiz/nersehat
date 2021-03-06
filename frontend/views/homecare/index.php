<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\HomecareSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Homecare';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="homecare-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Homecare', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'jenis_perawatan',
            'tanggal',
            'jam',
            'lokasi',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
