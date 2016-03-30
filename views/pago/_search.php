<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PagoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pago-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fecha_registro') ?>

    <?= $form->field($model, 'fecha_pago') ?>

    <?= $form->field($model, 'medio') ?>

    <?= $form->field($model, 'valor') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'info') ?>

    <?php // echo $form->field($model, 'comprobante') ?>

    <?php // echo $form->field($model, 'academia') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
