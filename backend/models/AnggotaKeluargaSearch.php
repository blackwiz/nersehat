<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AnggotaKeluarga;

/**
 * AnggotaKeluargaSearch represents the model behind the search form about `backend\models\AnggotaKeluarga`.
 */
class AnggotaKeluargaSearch extends AnggotaKeluarga
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['aid', 'kid'], 'integer'],
            [['nama_lengkap', 'tempat_lahir', 'tanggal_lahir', 'keluhan_sekarang', 'catatan_perkembangan'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = AnggotaKeluarga::find();

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
            'aid' => $this->aid,
            'kid' => $this->kid,
            'tanggal_lahir' => $this->tanggal_lahir,
        ]);

        $query->andFilterWhere(['like', 'nama_lengkap', $this->nama_lengkap])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'keluhan_sekarang', $this->keluhan_sekarang])
            ->andFilterWhere(['like', 'catatan_perkembangan', $this->catatan_perkembangan]);

        return $dataProvider;
    }
}
