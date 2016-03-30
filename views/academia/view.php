<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Academia */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Academias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="academia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre',
            'direccion',
            'fecha_desde',
            'email:email',
            'numero_carros',
            'numero_motos',
            'costo_por_ciclo',
            'fecha_inicial_facturacion',
            'dias_por_ciclo',
            'dia_notificacion_previa',
            'dia_notificacion_corte',
            'dia_notificacion_preaviso',
            'dia_suspension',
            'estado',
            'notificar_en_plataforma',
            'notificar_al_correo',
        ],
    ]) ?>

</div>
