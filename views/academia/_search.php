<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AcademiaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="academia-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'direccion') ?>

    <?= $form->field($model, 'fecha_desde') ?>

    <?= $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'numero_carros') ?>

    <?php // echo $form->field($model, 'numero_motos') ?>

    <?php // echo $form->field($model, 'costo_por_ciclo') ?>

    <?php // echo $form->field($model, 'fecha_inicial_facturacion') ?>

    <?php // echo $form->field($model, 'dias_por_ciclo') ?>

    <?php // echo $form->field($model, 'dia_notificacion_previa') ?>

    <?php // echo $form->field($model, 'dia_notificacion_corte') ?>

    <?php // echo $form->field($model, 'dia_notificacion_preaviso') ?>

    <?php // echo $form->field($model, 'dia_suspension') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'notificar_en_plataforma') ?>

    <?php // echo $form->field($model, 'notificar_al_correo') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
