<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "academia".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $direccion
 * @property string $fecha_desde
 * @property string $email
 * @property integer $numero_carros
 * @property integer $numero_motos
 * @property string $costo_por_ciclo
 * @property string $fecha_inicial_facturacion
 * @property integer $dias_por_ciclo
 * @property integer $dia_notificacion_previa
 * @property integer $dia_notificacion_corte
 * @property integer $dia_notificacion_preaviso
 * @property integer $dia_suspension
 * @property integer $estado
 * @property integer $notificar_en_plataforma
 * @property integer $notificar_al_correo
 *
 * @property Pago[] $pagos
 */
class Academia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'academia';
    }

    /**
     * @inheritdoc
     * @return AcademiaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AcademiaQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'direccion', 'fecha_desde', 'email', 'costo_por_ciclo', 'fecha_inicial_facturacion', 'dias_por_ciclo', 'dia_notificacion_previa', 'dia_notificacion_corte', 'dia_notificacion_preaviso', 'dia_suspension', 'notificar_en_plataforma', 'notificar_al_correo'], 'required'],
            [['fecha_desde', 'fecha_inicial_facturacion'], 'safe'],
            [['numero_carros', 'numero_motos', 'dias_por_ciclo', 'dia_notificacion_previa', 'dia_notificacion_corte', 'dia_notificacion_preaviso', 'dia_suspension', 'estado', 'notificar_en_plataforma', 'notificar_al_correo'], 'integer'],
            [['costo_por_ciclo'], 'number'],
            [['nombre', 'direccion', 'email'], 'string', 'max' => 255],
            [['nombre'], 'unique']
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
            'direccion' => Yii::t('app', 'Direccion'),
            'fecha_desde' => Yii::t('app', 'Fecha Desde'),
            'email' => Yii::t('app', 'Email'),
            'numero_carros' => Yii::t('app', 'Numero Carros'),
            'numero_motos' => Yii::t('app', 'Numero Motos'),
            'costo_por_ciclo' => Yii::t('app', 'Costo Por Ciclo'),
            'fecha_inicial_facturacion' => Yii::t('app', 'Fecha Inicial Facturacion'),
            'dias_por_ciclo' => Yii::t('app', 'Dias Por Ciclo'),
            'dia_notificacion_previa' => Yii::t('app', 'Dia Notificacion Previa'),
            'dia_notificacion_corte' => Yii::t('app', 'Dia Notificacion Corte'),
            'dia_notificacion_preaviso' => Yii::t('app', 'Dia Notificacion Preaviso'),
            'dia_suspension' => Yii::t('app', 'Dia Suspension'),
            'estado' => Yii::t('app', 'Estado'),
            'notificar_en_plataforma' => Yii::t('app', 'Notificar En Plataforma'),
            'notificar_al_correo' => Yii::t('app', 'Notificar Al Correo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagos()
    {
        return $this->hasMany(Pago::className(), ['academia' => 'id']);
    }
}
