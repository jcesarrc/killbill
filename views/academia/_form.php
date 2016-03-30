<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Academia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="academia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_desde')->widget(DateControl::classname(), [
        'type' => DateControl::FORMAT_DATE,
    ]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero_carros')->textInput() ?>

    <?= $form->field($model, 'numero_motos')->textInput() ?>

    <?= $form->field($model, 'costo_por_ciclo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_inicial_facturacion')->textInput() ?>

    <?= $form->field($model, 'dias_por_ciclo')->textInput() ?>

    <?= $form->field($model, 'dia_notificacion_previa')->textInput() ?>

    <?= $form->field($model, 'dia_notificacion_corte')->textInput() ?>

    <?= $form->field($model, 'dia_notificacion_preaviso')->textInput() ?>

    <?= $form->field($model, 'dia_suspension')->textInput() ?>

    <?= $form->field($model, 'estado')->textInput() ?>

    <?= $form->field($model, 'notificar_en_plataforma')->textInput() ?>

    <?= $form->field($model, 'notificar_al_correo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
