<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PagoSearch represents the model behind the search form about `app\models\Pago`.
 */
class PagoSearch extends Pago
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'medio', 'estado', 'academia'], 'integer'],
            [['fecha_registro', 'fecha_pago', 'info', 'comprobante'], 'safe'],
            [['valor'], 'number'],
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
        $query = Pago::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'fecha_registro' => $this->fecha_registro,
            'fecha_pago' => $this->fecha_pago,
            'medio' => $this->medio,
            'valor' => $this->valor,
            'estado' => $this->estado,
            'academia' => $this->academia,
        ]);

        $query->andFilterWhere(['like', 'info', $this->info])
            ->andFilterWhere(['like', 'comprobante', $this->comprobante]);

        return $dataProvider;
    }
}
