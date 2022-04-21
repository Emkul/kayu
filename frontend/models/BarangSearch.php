<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Barang;

/**
 * BarangSearch represents the model behind the search form of `frontend\models\Barang`.
 */
class BarangSearch extends Barang
{
    public $globalSearch;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'jenis', 'harga', 'pengiklan', 'is_deleted', 'jumlah'], 'integer'],
            [['judul', 'globalSearch', 'keterangan', 'created_at', 'updated_at', 'ukuran', 'alamat', 'mobil', 'sopir', 'no_hp', 'no_wa'], 'safe'],
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
        // $query->orFilterWhere([
        //     'id' => $this->id,
        //     'jenis' => $this->jenis,
        //     'harga' => $this->harga,
        //     'created_at' => $this->created_at,
        //     'updated_at' => $this->updated_at,
        //     'pengiklan' => $this->pengiklan,
        //     'is_deleted' => $this->is_deleted,
        //     'jumlah' => $this->jumlah,
        // ]);

        $query->orFilterWhere(['like', 'judul', $this->globalSearch])
            ->orFilterWhere(['like', 'keterangan', $this->globalSearch])
            ->orFilterWhere(['like', 'ukuran', $this->globalSearch])
            ->orFilterWhere(['like', 'alamat', $this->globalSearch])
            ->orFilterWhere(['like', 'mobil', $this->globalSearch])
            ->orFilterWhere(['like', 'sopir', $this->globalSearch])
            ->orFilterWhere(['like', 'no_hp', $this->globalSearch])
            ->orFilterWhere(['like', 'no_wa', $this->globalSearch]);

        return $dataProvider;
    }
}
