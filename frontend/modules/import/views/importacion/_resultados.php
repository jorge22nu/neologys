<?php use yii\grid\GridView;
use frontend\modules\import\ModuleImport as m;
use yii\widgets\Pjax;
use yii\widgets\DetailView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
?>


<?php if(count($errores)>0){?>
<div class="alert alert-danger" role="alert">       
       <?= $errores['activo'][0]?>        
</div>
<?php }elseif($nerrores>0){  ?>
<div class="alert alert-danger" role="alert">       
       <?= m::t('m_import','The process ended with {nerrores} errors',['nerrores'=>$nerrores]);?>        
</div>
<?php 
}else{ ?>
  <div class="alert alert-success" role="alert">       
       <?= m::t('m_import','The process was completed without errors');?>        
</div>
<?php
}

 echo DetailView::widget([
        'model' => $resumen,
       
    ]);
//var_dump($errores);
?>

 <div style='overflow:auto;'>
    <?php echo  GridView::widget([
        'dataProvider' => $dataProvider,
         'summary' => '',
         'tableOptions'=>['class'=>'table table-condensed table-hover table-bordered table-striped'],
        //'filterModel' => $searchModel,
        'columns' => [
             'numerolinea',
            'nombrecampo',
            'mensaje',
           // 'level',
            'fecha',
            'user_id',
           
            //'descripcion',
            //'format',
            //'modelo',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
</div>