    <?php
use yii\helpers\Url;
use yii\helpers\Html;
use frontend\modules\inter\Module as m;
use common\widgets\linkajaxgridwidget\linkAjaxGridWidget;
use common\widgets\buttonajaxwidget\buttonAjaxWidget;
 USE yii\widgets\Pjax;
 use yii\grid\GridView;
?>
<?php Pjax::begin(['id'=>'grilla-plan-evaluaciones']); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   
       <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-teal-gradient">
            <div class="inner">
                <h3><?php Pjax::begin(['id'=>'pjax-cantidad']); echo $model->getInterconvocados()->count() ; Pjax::end(); ?></h3>

              <p><?=m::t('labels','Convened Students')?></p>
            </div>
            <div class="icon">
                <span style="color:white;opacity:0.5;"><i class="fa fa-users"></i></span>
            </div>
            <?php 
            $url=Url::to(['cantidades-en-riesgo']);
            echo Html::a(m::t('labels','Convene').'<i class="fa fa-arrow-circle-right"></i>','#', ['id'=>'enlaceconv_'.$model->id,'class'=>"small-box-footer"]);
            ?>
            
          </div>
       
        <?php 
   echo buttonAjaxWidget::widget([  
            'id'=>'enlaceconv_'.$model->id,
            'idGrilla'=>'pjax-cantidad',
            'ruta'=>Url::to(['/inter/programa/ajax-convoca','id'=>$model->id]),          
           //'posicion'=> \yii\web\View::POS_END           
        ]); 
   ?>
    
   </div>
   <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12"> 
       <?= GridView::widget([
        'id'=>'mi-grillhfhfha',
        'dataProvider' => new \yii\data\ActiveDataProvider(
                [
                    'query'=> frontend\modules\inter\models\InterPlan::find()->andWhere(['eval_id'=>$model->id])
                ]
                ),
        //'filterModel' => $searchModel,
        'columns' => [
             [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}{update}',
                'buttons' => [
                   
                         'update' => function ($url,$model) {
			    $url= Url::to(['modal-edit-plan','id'=>$model->id,'gridName'=>'grilla-plan-evaluaciones','idModal'=>'buscarvalor']);
                             //echo  Html::button(m::t('base.verbs','Modificar Rangos'), ['href' => $url, 'title' => m::t('labels','Agregar Tutor'),'id'=>'btn_contacts', 'class' => 'botonAbre btn btn-success']); 
                            return Html::a('<span class="btn btn-success btn-sm glyphicon glyphicon-pencil"></span>', $url, ['class'=>'botonAbre']);
                            },
                          
                         'delete' => function ($url,$model) {
			    $url = Url::toRoute($this->context->id.'/ajax-detach-psico',['id'=>$model->id]);
                             return Html::a('<span class="btn btn-danger btn-sm glyphicon glyphicon-trash"></span>', '#', ['title'=>$url,/*'id'=>$model->codparam,*/'family'=>'holas','id'=> \yii\helpers\Json::encode(['id'=>$model->id,'modelito'=> str_replace('@','\\',get_class($model))]),/*'title' => 'Borrar'*/]);
                            }
                    ]
                ],
                                   
                 
               'orden',
            'acronimo',
            'descripcion',
            //'documento.desdocu'
            //'parametro',
            
            //'valor1',
            //'valor2',

            
        ],
    ]); ?>
    
    <?php 
   echo linkAjaxGridWidget::widget([
         
            'idGrilla'=>'grilla-plan-evaluaciones',
            'family'=>'holas',
          'type'=>'POST',
           'evento'=>'click',
           'posicion'=> \yii\web\View::POS_END
           
        ]); 
   ?>
    



  <p>
         <?php $url= Url::to(['modal-new-plan','id'=>$model->id,'gridName'=>'grilla-plan-evaluaciones','idModal'=>'buscarvalor']);
                             //echo  Html::button(m::t('base.verbs','Modificar Rangos'), ['href' => $url, 'title' => m::t('labels','Agregar Tutor'),'id'=>'btn_contacts', 'class' => 'botonAbre btn btn-success']); 
                            echo Html::a('<span class="btn btn-success btn-sm glyphicon glyphicon-plus"></span>', $url, ['class'=>'botonAbre']);
         ?>           
 </p>

  <?php Pjax::end(); ?>
   </div>
    
