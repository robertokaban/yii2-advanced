<?php

namespace common\models;


use Yii;

/**
 * This is the model class for table "mahasiswa".
 *
 * @property int $mahasiswa_id
 * @property int $jurusan_id
 * @property string $nim
 * @property string $nama_mahasiswa
 * @property string $jenis_kelamin
 * @property string $alamat
 * @property string $no_telp
 * @property string $created
 * @property int|null $createdby
 * @property string $updated
 * @property int|null $updatedby
 *
 * @property Jurusan $jurusan
 */
class Mahasiswa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mahasiswa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jurusan_id', 'nim', 'nama_mahasiswa', 'jenis_kelamin', 'alamat', 'no_telp'], 'required'],
            [['jurusan_id', 'createdby', 'updatedby'], 'integer'],
            [['jenis_kelamin', 'alamat'], 'string'],
            [['created', 'updated'], 'safe'],
            [['nim'], 'string', 'max' => 8],
            [['nama_mahasiswa'], 'string', 'max' => 50],
            [['no_telp'], 'string', 'max' => 13],
            [['nim'], 'unique'],
            [['jurusan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jurusan::className(), 'targetAttribute' => ['jurusan_id' => 'jurusan_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'mahasiswa_id' => 'Mahasiswa ID',
            'jurusan_id' => 'Nama Jurusan',
            'nim' => 'Nim',
            'nama_mahasiswa' => 'Nama Mahasiswa',
            'jenis_kelamin' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
            'no_telp' => 'No Telp',
            'created' => 'Created',
            'createdby' => 'Createdby',
            'updated' => 'Updated',
            'updatedby' => 'Updatedby',
        ];
    }

    /**
     * Gets query for [[Jurusan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJurusan()
    {
        return $this->hasOne(Jurusan::className(), ['jurusan_id' => 'jurusan_id']);
    }
}
