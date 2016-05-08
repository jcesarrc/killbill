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
 * @property integer $dia_notificacion_previa
 * @property integer $dia_notificacion_presuspension
 * @property integer $dia_suspension
 * @property integer $dia_corte
 * @property integer $estado
 * @property integer $notificar_previa_plataforma
 * @property integer $notificar_previa_correo
 * @property integer $notificar_corte_plataforma
 * @property integer $notificar_corte_correo
 * @property integer $notificar_presuspension_plataforma
 * @property integer $notificar_presuspension_correo
 * @property integer $notificar_suspension_plataforma
 * @property integer $notificar_suspension_correo
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
            [['nombre', 'direccion', 'fecha_desde', 'email', 'dia_corte', 'costo_por_ciclo', 'fecha_inicial_facturacion', 'dia_notificacion_previa', 'dia_notificacion_presuspension', 'dia_suspension', 'notificar_previa_plataforma', 'notificar_previa_correo'], 'required'],
            [['fecha_desde', 'fecha_inicial_facturacion'], 'safe'],
            [['numero_carros', 'numero_motos', 'dia_notificacion_previa', 'dia_notificacion_presuspension', 'dia_suspension', 'estado', 'notificar_previa_plataforma', 'notificar_previa_correo', 'notificar_corte_plataforma', 'notificar_corte_correo', 'notificar_presuspension_plataforma', 'notificar_presuspension_correo', 'notificar_suspension_plataforma', 'notificar_suspension_correo'], 'integer'],
            [['costo_por_ciclo'], 'number'],
            [['nombre', 'direccion', 'email'], 'string', 'max' => 255],
            [['nombre'], 'unique'],
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
            'costo_por_ciclo' => Yii::t('app', 'Valor a pagar por mes'),
            'fecha_inicial_facturacion' => Yii::t('app', 'Fecha Inicial Facturacion'),
            'dia_notificacion_previa' => Yii::t('app', 'Dia Notificacion Previa'),
            'dia_notificacion_presuspension' => Yii::t('app', 'Dia Notificacion Presuspension'),
            'dia_corte' => Yii::t('app', 'Dia de corte'),
            'dia_suspension' => Yii::t('app', 'Dia Suspension'),
            'estado' => Yii::t('app', 'Estado'),
            'notificar_previa_plataforma' => Yii::t('app', 'Notificar Previa Plataforma'),
            'notificar_previa_correo' => Yii::t('app', 'Notificar Previa Correo'),
            'notificar_corte_plataforma' => Yii::t('app', 'Notificar Corte Plataforma'),
            'notificar_corte_correo' => Yii::t('app', 'Notificar Corte Correo'),
            'notificar_presuspension_plataforma' => Yii::t('app', 'Notificar Presuspension Plataforma'),
            'notificar_presuspension_correo' => Yii::t('app', 'Notificar Presuspension Correo'),
            'notificar_suspension_plataforma' => Yii::t('app', 'Notificar Suspension Plataforma'),
            'notificar_suspension_correo' => Yii::t('app', 'Notificar Suspension Correo'),
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
