<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medio_pago".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $info
 *
 * @property Pago[] $pagos
 */
class MedioPago extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'medio_pago';
    }

    /**
     * @inheritdoc
     * @return MedioPagoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MedioPagoQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nombre'], 'required'],
            [['id'], 'integer'],
            [['info'], 'string'],
            [['nombre'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'info' => Yii::t('app', 'Info'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagos()
    {
        return $this->hasMany(Pago::className(), ['medio' => 'id']);
    }
}
