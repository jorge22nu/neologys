<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\modules\inter\Module as m;

/* @var $this yii\web\View */
/* @var $model frontend\modules\inter\models\InterConvocados */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => m::t('labels', 'Inter Summoned'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="inter-convocados-view">

    <h4><?= Html::encode($this->title) ?></h4>

    <p>
        <?= Html::a(m::t('verbs', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(m::t('verbs', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => m::t('validaciones', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'universidad_id',
            'facultad_id',
            'depa_id',
            'modo_id',
            'codperiodo',
            'codocu',
            'programa_id',
            'clase',
            'status',
            'secuencia',
            'alumno_id',
            'docente_id',
            'persona_id',
            'identidad_id',
            'codalu',
            'codigo1',
            'codigo2',
        ],
    ]) ?>

</div>
