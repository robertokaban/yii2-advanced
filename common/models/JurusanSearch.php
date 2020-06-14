<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Jurusan;

/**
 * JurusanSearch represents the model behind the search form of `common\models\Jurusan`.
 */
class JurusanSearch extends Jurusan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jurusan_id', 'createdby', 'updatedby'], 'integer'],
            [['nama_jurusan', 'keterangan', 'created', 'updated'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Jurusan::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'jurusan_id' => $this->jurusan_id,
            'created' => $this->created,
            'createdby' => $this->createdby,
            'updated' => $this->updated,
            'updatedby' => $this->updatedby,
        ]);

        $query->andFilterWhere(['like', 'nama_jurusan', $this->nama_jurusan])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}