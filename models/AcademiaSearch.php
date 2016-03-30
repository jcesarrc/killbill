<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * AcademiaSearch represents the model behind the search form about `app\models\Academia`.
 */
class AcademiaSearch extends Academia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'numero_carros', 'numero_motos', 'dias_por_ciclo', 'dia_notificacion_previa', 'dia_notificacion_corte', 'dia_notificacion_preaviso', 'dia_suspension', 'estado', 'notificar_en_plataforma', 'notificar_al_correo'], 'integer'],
            [['nombre', 'direccion', 'fecha_desde', 'email', 'fecha_inicial_facturacion'], 'safe'],
            [['costo_por_ciclo'], 'number'],
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
        $query = Academia::find();

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
            'fecha_desde' => $this->fecha_desde,
            'numero_carros' => $this->numero_carros,
            'numero_motos' => $this->numero_motos,
            'costo_por_ciclo' => $this->costo_por_ciclo,
            'fecha_inicial_facturacion' => $this->fecha_inicial_facturacion,
            'dias_por_ciclo' => $this->dias_por_ciclo,
            'dia_notificacion_previa' => $this->dia_notificacion_previa,
            'dia_notificacion_corte' => $this->dia_notificacion_corte,
            'dia_notificacion_preaviso' => $this->dia_notificacion_preaviso,
            'dia_suspension' => $this->dia_suspension,
            'estado' => $this->estado,
            'notificar_en_plataforma' => $this->notificar_en_plataforma,
            'notificar_al_correo' => $this->notificar_al_correo,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
