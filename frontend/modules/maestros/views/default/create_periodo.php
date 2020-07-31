<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\sta\models\Periodos */

$this->title = Yii::t('base.labels', 'Create Periodos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('base.labels', 'Periodos'), 'url' => ['index-periodo']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periodos-create">

    <h4><?= Html::encode($this->title) ?></h4>
<div class="box box-success">
    <?= $this->render('_form_periodo', [
        'model' => $model,
    ]) ?>

</div>
</div>