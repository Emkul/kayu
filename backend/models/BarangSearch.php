<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Barang;

/**
 * BarangSearch represents the model behind the search form of `backend\models\Barang`.
 */
class BarangSearch extends Barang
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'jenis', 'harga', 'pengiklan', 'is_deleted', 'published', 'jumlah'], 'integer'],
            [['judul', 'keterangan', 'created_at', 'updated_at', 'ukuran', 'alamat', 'mobil', 'sopir', 'no_hp', 'no_wa'], 'safe'],
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
        $query = Barang::find();

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
            'id' => $this->id,
            'jenis' => $this->jenis,
            'harga' => $this->harga,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'pengiklan' => $this->pengiklan,
            'is_deleted' => $this->is_deleted,
            'published' => $this->published,
            'jumlah' => $this->jumlah,
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'ukuran', $this->ukuran])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'mobil', $this->mobil])
            ->andFilterWhere(['like', 'sopir', $this->sopir])
            ->andFilterWhere(['like', 'no_hp', $this->no_hp])
            ->andFilterWhere(['like', 'no_wa', $this->no_wa]);

        return $dataProvider;
    }
}
