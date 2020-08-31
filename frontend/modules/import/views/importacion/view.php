<?php
use frontend\modules\import\ModuleImport as m;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\import\models\ImportCargamasiva */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => m::t('m_import', 'Massive Loads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="import-cargamasiva-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(m::t('m_import', 'Edit'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
       
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'insercion',
            'escenario',
            'lastimport',
            'descripcion',
            'format',
            'modelo',
        ],
    ]) ?>

</div>
