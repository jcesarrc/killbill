<?php

use app\models\MedioPago;
use kartik\datecontrol\DateControl;
use kartik\money\MaskMoney;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pago */
/* @var $form yii\widgets\ActiveForm */
?>
<style>

    .left {
        float: left;
        width: 30%;
    }

    .left .col-lg-3 {
        width: 90% !important;
    }

    .center {
        float: left;
        width: 30%;
    }

    .center .col-lg-6 {
        width: 100% !important;
    }

</style>
<div class="pago-form">

    <?php $form = ActiveForm::begin(); ?>


    <div class="left">
        <h4>Academia</h4>
        <div class="row">
            <div class="col-lg-3">
                <?= DetailView::widget([
                    'model' => $model_detalle_academia,
                    'attributes' => [
                        'nombre',
                        'email:email',
                        [
                            'attribute' => 'dia_corte',
                            'value' => $model_detalle_academia->dia_corte . ' de cada mes',
                        ],
                        'costo_por_ciclo:currency',
                    ],
                ]) ?>
            </div>
        </div>

    </div>

    <div class="center">
        <h4>Detalles de pago</h4>
        <div class="row">
            <div class="col-lg-6"><?= $form->field($model, 'fecha_pago')->widget(DateControl::className(), [
                    'type' => DateControl::FORMAT_DATE
                ]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6"><?= $form->field($model, 'medio')->dropDownList(
                    ArrayHelper::map(MedioPago::find()->all(), 'id', 'nombre')
                ) ?></div>
        </div>

        <div class="row">
            <div class="col-lg-6"><?= $form->field($model, 'valor')->widget(MaskMoney::className(), [
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

        <div class="row">
            <div class="col-lg-6"><?= $form->field($model, 'comprobante')->textInput(['maxlength' => true]) ?></div>
        </div>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

    </div>

    <div class="right">
        <br>
        <br>
        <div class="row">
            <div class="col-lg-3"><?= $form->field($model, 'info')->textarea(['rows' => 12]) ?></div>
        </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>
