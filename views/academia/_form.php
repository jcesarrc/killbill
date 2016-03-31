<?php

use kartik\datecontrol\DateControl;
use kartik\money\MaskMoney;
use kartik\widgets\SwitchInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Academia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="academia-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Datos academia</h3>
        </div>
        <div class="panel-body">
            <div class="col-sm-3">
                <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-3">
                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-3">
                <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-3">
                <?= $form->field($model, 'fecha_desde')->widget(DateControl::classname(), [
                    'type' => DateControl::FORMAT_DATE,
                ]) ?>
            </div>
        </div>
    </div>


    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Datos autos/motos</h3>
        </div>
        <div class="panel-body">
            <div class="col-sm-2">
                <?= $form->field($model, 'numero_carros')->textInput() ?>
            </div>
            <div class="col-sm-2">
                <?= $form->field($model, 'numero_motos')->textInput() ?>
            </div>
        </div>
    </div>


    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Datos pago</h3>
        </div>
        <div class="panel-body">
            <div class="col-sm-3">
                <?= $form->field($model, 'fecha_inicial_facturacion')->widget(DateControl::classname(), [
                    'type' => DateControl::FORMAT_DATE,
                ]) ?>
            </div>

            <div class="col-sm-2">
                <?= $form->field($model, 'dias_por_ciclo')->textInput() ?>
            </div>

            <div class="col-sm-3">
                <?= $form->field($model, 'costo_por_ciclo')->widget(MaskMoney::classname(), [
                    'pluginOptions' => [
                        'prefix' => '$ ',
                        'suffix' => '',
                        'thousands' => '.',
                        'decimal' => ',',
                        'allowNegative' => false
                    ]
                ]) ?>
            </div>

        </div>
    </div>


    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Control facturación</h3>
        </div>
        <div class="panel-body">
            <div class="col-sm-2">
                <?= $form->field($model, 'dia_notificacion_previa')->textInput() ?>
            </div>

            <div class="col-sm-2">
                <?= $form->field($model, 'dia_notificacion_corte')->textInput() ?>
            </div>

            <div class="col-sm-2">
                <?= $form->field($model, 'dia_notificacion_preaviso')->textInput() ?>
            </div>

            <div class="col-sm-2">
                <?= $form->field($model, 'dia_suspension')->textInput() ?>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Notificaciones sistema</h3>
    </div>
    <div class="panel-body">

        <div class="col-sm-3">
            <?= $form->field($model, 'notificar_en_plataforma')->widget(SwitchInput::classname(), [
                'pluginOptions' => [
                    'size' => 'small',
                    'onColor' => 'success',
                    'offColor' => 'danger',
                ]
            ]) ?>
        </div>

        <div class="col-sm-3">
            <?= $form->field($model, 'notificar_al_correo')->widget(SwitchInput::classname(), [
                'pluginOptions' => [
                    'size' => 'small',
                    'onColor' => 'success',
                    'offColor' => 'danger',
                ]
            ]) ?>
        </div>
    </div>
</div>


<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
