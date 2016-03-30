<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Academia */

$this->title = Yii::t('app', 'Create Academia');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Academias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="academia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
