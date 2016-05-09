<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pago".
 *
 * @property integer $id
 * @property string $fecha_registro
 * @property string $fecha_pago
 * @property integer $medio
 * @property string $valor
 * @property integer $estado
 * @property string $info
 * @property string $comprobante
 * @property integer $academia
 *
 * @property MedioPago $medio0
 * @property Academia $academia0
 */
class Pago extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pago';
    }

    /**
     * @inheritdoc
     * @return PagoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PagoQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_pago', 'medio', 'valor', 'comprobante', 'academia'], 'required'],
            [['fecha_registro', 'fecha_pago'], 'safe'],
            [['medio', 'estado', 'academia'], 'integer'],
            [['valor'], 'number'],
            [['info'], 'string'],
            [['comprobante'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'fecha_registro' => Yii::t('app', 'Fecha Registro'),
            'fecha_pago' => Yii::t('app', 'Fecha Pago'),
            'medio' => Yii::t('app', 'Medio'),
            'valor' => Yii::t('app', 'Valor'),
            'estado' => Yii::t('app', 'Estado'),
            'info' => Yii::t('app', 'Info'),
            'comprobante' => Yii::t('app', 'Comprobante'),
            'academia' => Yii::t('app', 'Academia'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedio0()
    {
        return $this->hasOne(MedioPago::className(), ['id' => 'medio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcademia0()
    {
        return $this->hasOne(Academia::className(), ['id' => 'academia']);
    }
}
