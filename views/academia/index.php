<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AcademiaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Academias');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="academia-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Academia'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'direccion',
            'fecha_desde',
            'email:email',
            // 'numero_carros',
            // 'numero_motos',
            // 'costo_por_ciclo',
            // 'fecha_inicial_facturacion',
            // 'dias_por_ciclo',
            // 'dia_notificacion_previa',
            // 'dia_notificacion_corte',
            // 'dia_notificacion_preaviso',
            // 'dia_suspension',
            // 'estado',
            // 'notificar_en_plataforma',
            // 'notificar_al_correo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
