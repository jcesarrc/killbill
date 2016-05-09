<?php

use app\models\Estados;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

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
            'nombre',
            'fecha_desde:date',
            'email:email',
            'costo_por_ciclo:currency',
            [
                'attribute' => 'dia_corte',
                'value' => function ($d) {
                    return $d->dia_corte . ' c/mes';
                }
            ],
            [
                'attribute' => 'dia_suspension',
                'value' => function ($d) {
                    return $d->dia_suspension . ' c/mes';
                }
            ],
            [
                'attribute' => 'estado',
                'format' => 'raw',
                'value' => function ($d) {
                    switch ($d->estado) {
                        case Estados::ACTIVO :
                            return Html::tag("span", "Activo", ["class" => "label label-success"]);
                            break;
                        case Estados::SUSPENDIDO:
                            return Html::tag("span", "Suspendido", ["class" => "label label-danger"]);
                            break;
                        case Estados::INFORMADO:
                            return Html::tag("span", "Informado", ["class" => "label label-warning"]);
                            break;
                    }
                }
            ],
            [
                'label' => '$',
                'format' => 'html',
                'value' => function ($d) {
                    return Html::a("$", Url::to(['pago/create', 'academia' => $d->id]), ["class" => "btn btn-xs btn-info"]);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
