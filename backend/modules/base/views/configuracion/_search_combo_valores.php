<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\base\Module as m;
/* @var $this yii\web\View */
/* @var $model common\models\masters\CombovaloresSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="combovalores-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nombretabla') ?>

    <?= $form->field($model, 'codcen') ?>

    <?= $form->field($model, 'codigo') ?>

    <?= $form->field($model, 'valor') ?>

    <?php // echo $form->field($model, 'valor1') ?>

    <?php // echo $form->field($model, 'valor2') ?>

    <div class="form-group">
        <?= Html::submitButton(m::t('verbs', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(m::t('verbs', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
