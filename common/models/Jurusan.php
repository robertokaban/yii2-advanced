<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "jurusan".
 *
 * @property int $jurusan_id
 * @property string $nama_jurusan
 * @property string $keterangan
 * @property string $created
 * @property int|null $createdby
 * @property string $updated
 * @property int|null $updatedby
 *
 * @property Mahasiswa[] $mahasiswas
 */
class Jurusan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jurusan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_jurusan', 'keterangan'], 'required'],
            [['keterangan'], 'string'],
            [['created', 'updated'], 'safe'],
            [['createdby', 'updatedby'], 'integer'],
            [['nama_jurusan'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'jurusan_id' => 'Jurusan ID',
            'nama_jurusan' => 'Nama Jurusan',
            'keterangan' => 'Keterangan',
            'created' => 'Created',
            'createdby' => 'Createdby',
            'updated' => 'Updated',
            'updatedby' => 'Updatedby',
        ];
    }

    /**
     * Gets query for [[Mahasiswas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMahasiswas()
    {
        return $this->hasMany(Mahasiswa::className(), ['jurusan_id' => 'jurusan_id']);
    }

    public static function listJurusan($jurusan_id=0){

        if($jurusan_id==0){

            $dataList=ArrayHelper::map(Jurusan::find()->asArray()->all(),'jurusan_id','nama_jurusan');

        } else {

            $dataList=ArrayHelper::map(Jurusan::find()->where(['jurusan_id'=>$jurusan_id])->asArray()->all(),'jurusan_id','nama_jurusan');

        }

        return $dataList;

    }
}
