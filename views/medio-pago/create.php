<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MedioPago */

$this->title = Yii::t('app', 'Create Medio Pago');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Medio Pagos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medio-pago-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
