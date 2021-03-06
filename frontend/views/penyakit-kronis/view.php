<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Artikel */

$this->title = $model->judul;
$this->params['breadcrumbs'][] = ['label' => 'Artikel', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artikel-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'template' => '<p>{value}</p>',
        'attributes' => [
            [
                'attribute' => 'gambar',
                'format'    => 'raw',
                'label'     => false,
                'value'     => $model->gambar ? Html::img(Url::to($model->gambar,true),['class' => 'img-responsive img-thumbnail']) : Html::img('@web/uploads/noimage.png',['class' => 'img-responsive img-thumbnail']),
            ],
            //'judul',
            'keterangan:ntext',
        ],
    ]) ?>

    <button type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target="#myModal">Hubungi Perawat Jaga</button>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Hubungi Perawat Jaga</h4>
      </div>
      <div class="modal-body">
        <?= GridView::widget([
            'dataProvider' => $dataProviderPerawat,
            //'filterModel' => $searchModelPerawat,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'pid',
                'id_perawat',
                'nama_perawat',
                'nomor_hp',
                //'layanan',
                // 'agama',
                // 'jenis_kelamin',
                // 'penempatan',
            ],
        ]); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Hubungi</button>
      </div>
    </div>
  </div>
</div>