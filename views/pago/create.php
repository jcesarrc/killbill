<?php

use app\models\MedioPago;
use yii\grid\GridView;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pago */

$this->title = Yii::t('app', 'Registrar Pago');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pagos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pago-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'model_detalle_academia' => $model_detalle_academia,
        'valor_a_pagar' => $valor_a_pagar,
        'periodo_a_pagar' => $periodo_a_pagar,
        'meses_a_pagar' => $meses_a_pagar,
    ]) ?>

    <h1><?= Html::encode("Historial de Pagos") ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'fecha_pago:date',
            [
                'attribute' => 'medio',
                'value' => function ($d) {
                    return MedioPago::findOne(['id' => $d->medio])->nombre;
                }
            ],
            'valor:currency',
            'comprobante',
            'info:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
