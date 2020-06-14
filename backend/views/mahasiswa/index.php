<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Jurusan;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MahasiswaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mahasiswas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mahasiswa-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Mahasiswa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'mahasiswa_id',
            //'jurusan_id',
            [
                'attribute'=>'jurusan_id',
                'value'=>'jurusan.nama_jurusan',
                'filter'=>Jurusan::listJurusan(),

            ],
            'nim',
            'nama_mahasiswa',
            'jenis_kelamin',
            'alamat:ntext',
            'no_telp',
            //'created',
            //'createdby',
            //'updated',
            //'updatedby',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
