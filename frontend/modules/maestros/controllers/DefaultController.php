<?php

namespace frontend\modules\maestros\controllers;

use yii\web\Controller;

use Yii;
use common\helpers\h;
use common\models\masters\Periodos;
use common\models\masters\Documentos;
use common\models\masters\DocumentosSearch;
use common\models\masters\Facultades;
use common\models\masters\FacultadesSearch;
use common\models\masters\Personas;
use common\models\masters\PersonasSearch;
use common\models\masters\Universidades;
use common\models\masters\UniversidadesSearch;
use common\models\masters\Trabajadores;
use common\models\masters\TrabajadoresSearch;
use common\models\masters\PeriodosSearch;
use common\models\masters\Carreras;
use common\models\masters\GrupoPersonasSearch;
use common\models\masters\GrupoPersonas;
use common\models\masters\AlumnosSearch;
use common\models\masters\Departamentos;
use common\models\masters\DepartamentosSearch;
use common\models\masters\Alumnos;
use common\models\masters\DocentesSearch;
use common\models\masters\Docentes;
use frontend\controllers\base\baseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\modules\maestros\MaestrosModule as m;
/**
 * Default controller for the `maestros` module
 */
class DefaultController extends \common\controllers\base\baseController

{
     public function actionIndexPeriodo()
    {
        $searchModel = new PeriodosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index_periodo', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Periodos model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionViewPeriodo($id)
    {
        return $this->render('view_periodo', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Periodos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreatePeriodo()
    {
        $model = new Periodos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index-periodo', 'id' => $model->codperiodo]);
        }

        return $this->render('create_periodo', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Periodos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdatePeriodo($id)
    {
        $model = $this->findModelPeriodo($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index-periodo', 'id' => $model->codperiodo]);
        }

        return $this->render('update_periodo', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Periodos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDeletePeriodo($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Periodos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Periodos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelPeriodo($id)
    {
        if (($model = Periodos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(m::t('validaciones', 'The requested page does not exist.'));
    }
    
    
    
    /**
     * Lists all Documentos models.
     * @return mixed
     */
    public function actionIndexDocu()
            
    {
       // echo yii::t('models.errors','hello friends');
        
        //die();
        $searchModel = new DocumentosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index_docu', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Documentos model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionViewDocu($id)
    {
        return $this->render('view_docu', [
            'model' => $this->findModelDocu($id),
        ]);
    }

    /**
     * Creates a new Documentos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateDocu()
    {
       
        $model = new Documentos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index-docu']);
        }

        return $this->render('create_docu', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Documentos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdateDocu($id)
    {
        $model = $this->findModelDocu($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             return $this->redirect(['index-docu']);
        }

        return $this->render('update_docu', [
            'model' => $model,
        ]);
    }

    

    /**
     * Finds the Documentos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Documentos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelDocu($id)
    {
        if (($model = Documentos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(m::t('validaciones', 'The requested page does not exist.'));
    }
    
    
    
    
    
    
     
    /**
     * Lists all Documentos models.
     * @return mixed
     */
    public function actionIndexFacul()
            
    {
       // echo yii::t('models.errors','hello friends');
        
        //die();
        $searchModel = new FacultadesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index_facul', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Documentos model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionViewFacul($id)
    {
        return $this->render('view_facul', [
            'model' => $this->findModelFacul($id),
        ]);
    }

    /**
     * Creates a new Documentos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateFacul()
    {
       
        $model = new Facultades();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index-facul']);
        }

        return $this->render('create_facul', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Documentos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdateFacul($id)
    {
        $model = $this->findModelFacul($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             return $this->redirect(['index-facul']);
        }

        return $this->render('update_facul', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Documentos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDeleteFacul($id)
    {
        $this->findModelFacul($id)->delete();

        return $this->redirect(['index-facul']);
    }

    /**
     * Finds the Documentos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Documentos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelFacul($id)
    {
        if (($model = Facultades::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(m::t('validaciones', 'The requested page does not exist.'));
    }
    
    
    
    
    
        /**
     * Lists all Trabajadores models.
     * @return mixed
     */
    public function actionIndexPersona()
    { 
        $searchModel = new PersonasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

   return $this->render('index_personas', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]); 
//}
        
    }

    /**
     * Displays a single Trabajadores model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionViewPersona($id)
    {
         $model=$this->findModelPersona($id);
        // var_dump(h::request()->isAjax,$model->load(h::request()->post()));die();
         if (h::request()->isAjax && $model->load(h::request()->post())) {
                h::response()->format = \yii\web\Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'El registro se ha grabado');
            // Multiple alerts can be set like below
           // Yii::$app->session->setFlash('kv-detail-warning', 'A last warning for completing all data.');
            //Yii::$app->session->setFlash('kv-detail-info', '<b>Note:</b> You can proceed by clicking <a href="#">this link</a>.');
            return $this->redirect(['view-persona', 'id'=>$model->id]);
        } else {
            return $this->render('view_personas', ['model'=>$model]);
        }
        
        
        
        
        
       
    }

    /**
     * Creates a new Trabajadores model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreatePersona()
    {
        $model = new Personas();
        
       
        if (h::request()->isAjax && $model->load(h::request()->post())) {
                h::response()->format = \yii\web\Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
        }
        
        
        
        if ($model->load(h::request()->post()) && $model->save()) {
            return $this->redirect(['view-persona', 'id' => $model->id]);
        }

        return $this->render('create_personas', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Trabajadores model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdatePersona($id)
    {
        $model = $this->findModelPersona($id);
     
       /* $modito=\frontend\modules\import\models\ImportCargamasivaUser::find(31)->one();
        $modito->setScenario('fechita');
        $modito->fechacarga=date('Y-m-d H:i:s');
        $modito->fechacarga=$modito->swichtDate('fechacarga',true);*/
        //var_dump(Carbon::now());die();
        //var_dump($modito->fechacarga,$modito->save(),$modito->getFirstError());die();
        // var_dump(date('d/m/Y H:i:s'));die();
         if (h::request()->isAjax && $model->load(h::request()->post())) {
                h::response()->format = \yii\web\Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
        }
        
        
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           return $this->redirect(['view-persona', 'id' => $model->id]);
        }

        
        
        return $this->render('update_personas', [
          'model'=>$model
        ]);
    }

    /**
     * Deletes an existing Trabajadores model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDeletePersona($id)
    {
        $this->findModelPersona($id)->delete();

        return $this->redirect(['index-persona']);
    }

    /**
     * Finds the Trabajadores model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Trabajadores the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelPersona($id)
    {
        if (($model = Personas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(m::t('validaciones', 'The requested page does not exist.'));
    }
    
    
    
    
    
    
    
    
    
    
    
    
        /**
     * Lists all Trabajadores models.
     * @return mixed
     */
    public function actionIndexUniver()
    { 
        $searchModel = new UniversidadesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

   return $this->render('index_univer', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]); 
//}
        
    }

    /**
     * Displays a single Trabajadores model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionViewUniver($id)
    {
         $model=$this->findModelUniver($id);
        // var_dump(h::request()->isAjax,$model->load(h::request()->post()));die();
         if (h::request()->isAjax && $model->load(h::request()->post())) {
                h::response()->format = \yii\web\Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'El registro se ha grabado');
            // Multiple alerts can be set like below
           // Yii::$app->session->setFlash('kv-detail-warning', 'A last warning for completing all data.');
            //Yii::$app->session->setFlash('kv-detail-info', '<b>Note:</b> You can proceed by clicking <a href="#">this link</a>.');
            return $this->redirect(['view-univer', 'id'=>$model->id]);
        } else {
            return $this->render('view_univer', ['model'=>$model]);
        }
        
        
        
        
        
       
    }

    /**
     * Creates a new Trabajadores model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateUniver()
    {
        $model = new Universidades();
        
       
        if (h::request()->isAjax && $model->load(h::request()->post())) {
                h::response()->format = \yii\web\Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
        }
        
        
        
        if ($model->load(h::request()->post()) && $model->save()) {
            return $this->redirect(['view-univer', 'id' => $model->id]);
        }

        return $this->render('create_univer', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Trabajadores model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdateUniver($id)
    {
        $model = $this->findModelUniver($id);
     
       /* $modito=\frontend\modules\import\models\ImportCargamasivaUser::find(31)->one();
        $modito->setScenario('fechita');
        $modito->fechacarga=date('Y-m-d H:i:s');
        $modito->fechacarga=$modito->swichtDate('fechacarga',true);*/
        //var_dump(Carbon::now());die();
        //var_dump($modito->fechacarga,$modito->save(),$modito->getFirstError());die();
        // var_dump(date('d/m/Y H:i:s'));die();
         if (h::request()->isAjax && $model->load(h::request()->post())) {
                h::response()->format = \yii\web\Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
        }
        
        
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           return $this->redirect(['view-univer', 'id' => $model->id]);
        }

        
        
        return $this->render('update_univer', [
          'model'=>$model
        ]);
    }

    /**
     * Deletes an existing Trabajadores model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDeleteUniver($id)
    {
        $this->findModelUniver($id)->delete();

        return $this->redirect(['index-univer']);
    }

    /**
     * Finds the Trabajadores model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Trabajadores the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelUniver($id)
    {
        if (($model = Universidades::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(m::t('validaciones', 'The requested page does not exist.'));
    }
    
    
    
    
     
    
    
        /**
     * Lists all Trabajadores models.
     * @return mixed
     */
    public function actionIndexGrupoPersonas()
    { 
        $searchModel = new GrupoPersonasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

   return $this->render('index_grupopersonas', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]); 
//}
        
    }

    /**
     * Displays a single Trabajadores model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionViewGrupoPersonas($id)
    {
         $model=$this->findModelGrupoPersonas($id);
        // var_dump(h::request()->isAjax,$model->load(h::request()->post()));die();
         if (h::request()->isAjax && $model->load(h::request()->post())) {
                h::response()->format = \yii\web\Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'El registro se ha grabado');
            // Multiple alerts can be set like below
           // Yii::$app->session->setFlash('kv-detail-warning', 'A last warning for completing all data.');
            //Yii::$app->session->setFlash('kv-detail-info', '<b>Note:</b> You can proceed by clicking <a href="#">this link</a>.');
            return $this->redirect(['view-grupopersonas', 'id'=>$model->codgrupo]);
        } else {
            return $this->render('view_grupopersonas', ['model'=>$model]);
        }
        
        
        
        
        
       
    }

    /**
     * Creates a new Trabajadores model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateGrupoPersonas()
    {
        $model = new GrupoPersonas();
        
       
        if (h::request()->isAjax && $model->load(h::request()->post())) {
                h::response()->format = \yii\web\Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
        }
        
        
        
        if ($model->load(h::request()->post()) && $model->save()) {
            return $this->redirect(['view-grupo-personas', 'id' => $model->codgrupo]);
        }else{
           // print_r($model->getErrors());
        }

        return $this->render('create_grupopersonas', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Trabajadores model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdateGrupoPersonas($id)
    {
        $model = $this->findModelGrupoPersonas($id);
     
       /* $modito=\frontend\modules\import\models\ImportCargamasivaUser::find(31)->one();
        $modito->setScenario('fechita');
        $modito->fechacarga=date('Y-m-d H:i:s');
        $modito->fechacarga=$modito->swichtDate('fechacarga',true);*/
        //var_dump(Carbon::now());die();
        //var_dump($modito->fechacarga,$modito->save(),$modito->getFirstError());die();
        // var_dump(date('d/m/Y H:i:s'));die();
         if (h::request()->isAjax && $model->load(h::request()->post())) {
                h::response()->format = \yii\web\Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
        }
        
        
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           return $this->redirect(['view-grupo-personas', 'id' => $model->codgrupo]);
        }

        
        
        return $this->render('update_grupopersonas', [
          'model'=>$model
        ]);
    }

    /**
     * Deletes an existing Trabajadores model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDeleteGrupoPersonas($id)
    {
        $this->findModelGrupoPersonas($id)->delete();

        return $this->redirect(['index-grupo-personas']);
    }

    /**
     * Finds the Trabajadores model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Trabajadores the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelGrupoPersonas($id)
    {
        if (($model = GrupoPersonas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(m::t('validaciones', 'The requested page does not exist.'));
    }
    
     
    
    
    
    
    
    
    
    
    
    
    
    public function actionIndexTrabajadores()
    { 
        $searchModel = new TrabajadoresSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

   return $this->render('index_trabajadores', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]); 
//}
        
    }

    /**
     * Displays a single Trabajadores model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionViewTrabajadores($id)
    {
         $model=$this->findModelTrabajadores($id);
        // var_dump(h::request()->isAjax,$model->load(h::request()->post()));die();
         if (h::request()->isAjax && $model->load(h::request()->post())) {
                h::response()->format = \yii\web\Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'El registro se ha grabado');
            // Multiple alerts can be set like below
           // Yii::$app->session->setFlash('kv-detail-warning', 'A last warning for completing all data.');
            //Yii::$app->session->setFlash('kv-detail-info', '<b>Note:</b> You can proceed by clicking <a href="#">this link</a>.');
            return $this->redirect(['view-trabajadores', 'id'=>$model->id]);
        } else {
            return $this->render('view_trabajadores', ['model'=>$model]);
        }
        
        
        
        
        
       
    }

    /**
     * Creates a new Trabajadores model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateTrabajadores()
    {
        $model = new Trabajadores();
        
       
        if (h::request()->isAjax && $model->load(h::request()->post())) {
                h::response()->format = \yii\web\Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
        }
        
        
        
        if ($model->load(h::request()->post()) && $model->save()) {
            return $this->redirect(['view-trabajadores', 'id' => $model->id]);
        }else{
           // print_r($model->getErrors());
        }

        return $this->render('create_trabajadores', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Trabajadores model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdateTrabajadores($id)
    {
        $model = $this->findModelTrabajadores($id);
     
       /* $modito=\frontend\modules\import\models\ImportCargamasivaUser::find(31)->one();
        $modito->setScenario('fechita');
        $modito->fechacarga=date('Y-m-d H:i:s');
        $modito->fechacarga=$modito->swichtDate('fechacarga',true);*/
        //var_dump(Carbon::now());die();
        //var_dump($modito->fechacarga,$modito->save(),$modito->getFirstError());die();
        // var_dump(date('d/m/Y H:i:s'));die();
         if (h::request()->isAjax && $model->load(h::request()->post())) {
                h::response()->format = \yii\web\Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
        }
        
        
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           return $this->redirect(['view-trabajadores', 'id' => $model->id]);
        }

        
        
        return $this->render('update_trabajadores', [
          'model'=>$model
        ]);
    }

    /**
     * Deletes an existing Trabajadores model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDeleteTrabajadores($id)
    {
        $this->findModelTrabajadores($id)->delete();

        return $this->redirect(['index-trabajadores']);
    }

    /**
     * Finds the Trabajadores model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Trabajadores the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelTrabajadores($id)
    {
        if (($model = Trabajadores::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(m::t('validaciones', 'The requested page does not exist.'));
    }
    
     
    
    
    
    public function actionModalNewFacultad($id){
     $this->layout = "install";
        $model = New Facultades();
        $datos=[];
        $modelUniversidad= Universidades::findOne($id);
        if(is_null($modelUniversidad)){
            //Si es error buttonSubmitWidget::OP_TERCERA
            //lanza un NOTY msg de error
            return ['success'=>buttonSubmitWidget::OP_TERCERA,'msg'=>$datos];
        }
        $model->universidad_id=$modelUniversidad->id;
      
        if(h::request()->isPost){
            //$model->setScenario(Rangos::SCENARIO_HORAS);
            $model->load(h::request()->post());
             h::response()->format = \yii\web\Response::FORMAT_JSON;
            $datos=\yii\widgets\ActiveForm::validate($model);
            if(count($datos)>0){
               return ['success'=>\common\widgets\buttonsubmitwidget\buttonSubmitWidget::OP_SEGUNDA,'msg'=>$datos];  
            }else{
                $model->save();
                
                  return ['success'=>\common\widgets\buttonsubmitwidget\buttonSubmitWidget::OP_PRIMERA,'id'=>$model->id];
            }
        }else{
            //var_dump($model->attributes);die();
           return $this->renderAjax('_modal_facultades', [
                        'model' => $model,
                        'universidad_id'=> $id,
                        'gridName'=>h::request()->get('gridName'),
                        'idModal'=>h::request()->get('idModal'),
                        //'cantidadLibres'=>$cantidadLibres,
          
            ]);  
        }
       
  }  
    
    
     public function actionModalUpdateFacultad($id){
     $this->layout = "install";
      h::response()->format = \yii\web\Response::FORMAT_JSON;
        $model = Facultades::findOne($id);
        $datos=[];
        //$modelUniversidad= Universidades::findOne($id);
        if(is_null($model)){
            //Si es error buttonSubmitWidget::OP_TERCERA
            //lanza un NOTY msg de error
            return ['success'=>\common\widgets\buttonsubmitwidget\buttonSubmitWidget::OP_TERCERA,'msg'=>$datos];
        }
        //$model->universidad_id=$modelUniversidad->id;
      
        if(h::request()->isPost){
            //$model->setScenario(Rangos::SCENARIO_HORAS);
            $model->load(h::request()->post());
            
            $datos=\yii\widgets\ActiveForm::validate($model);
            if(count($datos)>0){
               return ['success'=>\common\widgets\buttonsubmitwidget\buttonSubmitWidget::OP_SEGUNDA,'msg'=>$datos];  
            }else{
                $model->save();
                
                  return ['success'=>\common\widgets\buttonsubmitwidget\buttonSubmitWidget::OP_PRIMERA,'id'=>$model->id];
            }
        }else{
            //var_dump($model->attributes);die();
           return $this->renderAjax('_modal_facultades', [
                        'model' => $model,
                        'universidad_id'=> $id,
                        'gridName'=>h::request()->get('gridName'),
                        'idModal'=>h::request()->get('idModal'),
                        //'cantidadLibres'=>$cantidadLibres,
          
            ]);  
        }
       
   } 
   
      
   public function actionIndexAlumnos()
    { 
        $searchModel = new AlumnosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render
                            (
                             'index_alumno', 
                             [
                              'searchModel' => $searchModel,
                              'dataProvider' => $dataProvider,
                             ]
                            );         
    }

    
    public function actionIndexDocentes()
    { 
        $searchModel = new DocentesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render
                            (
                             'index_docente', 
                             [
                              'searchModel' => $searchModel,
                              'dataProvider' => $dataProvider,
                             ]
                            );         
    }
    
    /**
     * Displays a single Trabajadores model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionViewAlumnos($id)
    {
         $model=$this->findModelAlumnos($id);
        // var_dump(h::request()->isAjax,$model->load(h::request()->post()));die();
         if (h::request()->isAjax && $model->load(h::request()->post())) {
                h::response()->format = \yii\web\Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'El registro se ha grabado');
            // Multiple alerts can be set like below
           // Yii::$app->session->setFlash('kv-detail-warning', 'A last warning for completing all data.');
            //Yii::$app->session->setFlash('kv-detail-info', '<b>Note:</b> You can proceed by clicking <a href="#">this link</a>.');
            return $this->redirect(['view-alumnos', 'id'=>$model->id]);
        } else {
            return $this->render('view_alumno', ['model'=>$model]);
        }
    }

    public function actionViewDocentes($id)
    {
         $model=$this->findModelDocentes($id);
        // var_dump(h::request()->isAjax,$model->load(h::request()->post()));die();
         if (h::request()->isAjax && $model->load(h::request()->post())) {
                h::response()->format = \yii\web\Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'El registro se ha grabado');
            // Multiple alerts can be set like below
           // Yii::$app->session->setFlash('kv-detail-warning', 'A last warning for completing all data.');
            //Yii::$app->session->setFlash('kv-detail-info', '<b>Note:</b> You can proceed by clicking <a href="#">this link</a>.');
            return $this->redirect(['view-docentes', 'id'=>$model->id]);
        } else {
            return $this->render('view_docente', ['model'=>$model]);
        }
    }
    
    /**
     * Creates a new Trabajadores model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateAlumnos()
    {
        $model = new Alumnos();
        
       
        if (h::request()->isAjax && $model->load(h::request()->post())) {
                h::response()->format = \yii\web\Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
        }
        
        
        
        if ($model->load(h::request()->post()) && $model->save()) {
            return $this->redirect(['view-alumnos', 'id' => $model->id]);
        }else{
            //print_r($model->getErrors());die();
        }

        return $this->render('create_alumno', [
            'model' => $model,
        ]);
    }

    public function actionCreateDocentes()
    {
        $model = new Docentes();
        
        if (h::request()->isAjax && $model->load(h::request()->post())) {
                h::response()->format = \yii\web\Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
        }
        
        if ($model->load(h::request()->post()) && $model->save()) {
            return $this->redirect(['view-docentes', 'id' => $model->id]);
        }else{
            //print_r($model->getErrors());die();
        }

        return $this->render('create_docente', [
            'model' => $model,
        ]);
    }
    /**
     * Updates an existing Trabajadores model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdateAlumnos($id)
    {
        $model = $this->findModelAlumnos($id);
     
       /* $modito=\frontend\modules\import\models\ImportCargamasivaUser::find(31)->one();
        $modito->setScenario('fechita');
        $modito->fechacarga=date('Y-m-d H:i:s');
        $modito->fechacarga=$modito->swichtDate('fechacarga',true);*/
        //var_dump(Carbon::now());die();
        //var_dump($modito->fechacarga,$modito->save(),$modito->getFirstError());die();
        // var_dump(date('d/m/Y H:i:s'));die();
         if (h::request()->isAjax && $model->load(h::request()->post())) {
                h::response()->format = \yii\web\Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
        }
        
        
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           return $this->redirect(['view-alumnos', 'id' => $model->id]);
        }

        
        
        return $this->render('update_alumno', [
          'model'=>$model
        ]);
    }

    public function actionUpdateDocentes($id)
    {
        $model = $this->findModelDocentes($id);
     
        if (h::request()->isAjax && $model->load(h::request()->post())) {
                h::response()->format = \yii\web\Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
        }
     
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           return $this->redirect(['view-docentes', 'id' => $model->id]);
        }

        
        
        return $this->render('update_docente', [
          'model'=>$model
        ]);
    }
    /**
     * Deletes an existing Trabajadores model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    /*public function actionDeleteAlumnos($id)
    {
        $this->findModelTrabajadores($id)->delete();

        return $this->redirect(['index-alumno']);
    }*/

    public function actionDeleteAlumnos($id)
    {
        if(h::request()->isAjax)
            {
                h::response()->format = \yii\web\Response::FORMAT_JSON;
                $model= Alumnos::findOne($id);
            
                if(is_null($model))
                throw new NotFoundHttpException(m::t('validaciones', 'The requested page does not exist.'));
                $this->deleteModel($id, $model::className());
                return ['warning'=>m::t('validaciones','The record was deleted')];
            }
     }
    
    public function actionDeleteDocentes($id)
    {
        if(h::request()->isAjax)
            {
                h::response()->format = \yii\web\Response::FORMAT_JSON;
                $model= Docentes::findOne($id);
            
                if(is_null($model))
                throw new NotFoundHttpException(m::t('validaciones', 'The requested page does not exist.'));
                $this->deleteModel($id, $model::className());
                return ['warning'=>m::t('validaciones','The record was deleted')];
            }
    } 
    
    /**
     * Finds the Trabajadores model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Trabajadores the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelAlumnos($id)
    {
        if (($model = Alumnos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(m::t('validaciones', 'The requested page does not exist.'));
    }
       
    protected function findModelDocentes($id)
    {
        if (($model = Docentes::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(m::t('validaciones', 'The requested page does not exist.'));
    }
    
    
    
    
    
    
    
    
   
   
   
   public function actionIndexDepartamentos()
    { 
        $searchModel = new DepartamentosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

   return $this->render('index_departamento', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]); 
//}
        
    }

    /**
     * Displays a single Trabajadores model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionViewDepartamento($id)
    {
         $model=$this->findModelDepartamentos($id);
          return $this->render('view_departamento', ['model'=>$model]);
        }
        
        
        
        
        
       
    

    /**
     * Creates a new Trabajadores model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateDepartamento()
    {
        $model = new Departamentos();
        
       
        if (h::request()->isAjax && $model->load(h::request()->post())) {
                h::response()->format = \yii\web\Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
        }
        
        
        
        if ($model->load(h::request()->post()) && $model->save()) {
            return $this->redirect(['view-departamento', 'id' => $model->coddepa]);
        }else{
           // print_r($model->getErrors());die();
        }

        return $this->render('create_departamento', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Trabajadores model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdateDepartamento($id)
    {
        $model = $this->findModelDepartamentos($id);
     
       /* $modito=\frontend\modules\import\models\ImportCargamasivaUser::find(31)->one();
        $modito->setScenario('fechita');
        $modito->fechacarga=date('Y-m-d H:i:s');
        $modito->fechacarga=$modito->swichtDate('fechacarga',true);*/
        //var_dump(Carbon::now());die();
        //var_dump($modito->fechacarga,$modito->save(),$modito->getFirstError());die();
        // var_dump(date('d/m/Y H:i:s'));die();
         if (h::request()->isAjax && $model->load(h::request()->post())) {
                h::response()->format = \yii\web\Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
        }
        
        
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           return $this->redirect(['view-departamento', 'id' => $model->coddepa]);
        }

        
        
        return $this->render('update_departamento', [
          'model'=>$model
        ]);
    }

    /**
     * Deletes an existing Trabajadores model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDeleteDepartamento($id)
    {
        $this->findModelDepartamentos($id)->delete();

        return $this->redirect(['index-alumno']);
    }

    /**
     * Finds the Trabajadores model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Trabajadores the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelDepartamentos($id)
    {
        if (($model = Departamentos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(m::t('validaciones', 'The requested page does not exist.'));
    }
    
    
    
    
    
      public function actionModalNewDepa($id){
     $this->layout = "install";
        $model = New Departamentos();
        $datos=[];
        $modelFacultad= Facultades::findOne($id);
        
        if(is_null($modelFacultad)){
            //Si es error buttonSubmitWidget::OP_TERCERA
            //lanza un NOTY msg de error
            return ['success'=>\common\widgets\buttonsubmitwidget\buttonSubmitWidget::OP_TERCERA,'msg'=>$datos];
        }
        
        $model->universidad_id=$modelFacultad->universidad_id;
        $model->facultad_id=$modelFacultad->id;
        if(h::request()->isPost){
            //$model->setScenario(Rangos::SCENARIO_HORAS);
            $model->load(h::request()->post());
             h::response()->format = \yii\web\Response::FORMAT_JSON;
            $datos=\yii\widgets\ActiveForm::validate($model);
            if(count($datos)>0){
               return ['success'=>\common\widgets\buttonsubmitwidget\buttonSubmitWidget::OP_SEGUNDA,'msg'=>$datos];  
            }else{
                $model->save();
                
                  return ['success'=>\common\widgets\buttonsubmitwidget\buttonSubmitWidget::OP_PRIMERA,'id'=>$model->facultad_id];
            }
        }else{
            //var_dump($model->attributes);die();
           return $this->renderAjax('_modal_depa', [
                        'model' => $model,
                        'facultad_id'=> $model->facultad_id,
                        'gridName'=>h::request()->get('gridName'),
                        'idModal'=>h::request()->get('idModal'),
                        //'cantidadLibres'=>$cantidadLibres,
          
            ]);  
        }
       
  }  
    
    
     public function actionModalUpdateDepa($id){
     $this->layout = "install";
        $model = Departamentos::findOne($id);
        $datos=[];
        //$modelUniversidad= Universidades::findOne($id);
        if(is_null($model)){
            //Si es error buttonSubmitWidget::OP_TERCERA
            //lanza un NOTY msg de error
            echo m::t('validaciones','Record not found');die();
            return ['success'=>\common\widgets\buttonsubmitwidget\buttonSubmitWidget::OP_TERCERA,'msg'=>$datos];
        }
        //$model->universidad_id=$modelUniversidad->id;
      
        if(h::request()->isPost){
            //$model->setScenario(Rangos::SCENARIO_HORAS);
            $model->load(h::request()->post());
             h::response()->format = \yii\web\Response::FORMAT_JSON;
            $datos=\yii\widgets\ActiveForm::validate($model);
            if(count($datos)>0){
               return ['success'=>\common\widgets\buttonsubmitwidget\buttonSubmitWidget::OP_SEGUNDA,'msg'=>$datos];  
            }else{
                $model->save();
                
                  return ['success'=>\common\widgets\buttonsubmitwidget\buttonSubmitWidget::OP_PRIMERA,'id'=>$model->facultad_id];
            }
        }else{
            //var_dump($model->attributes);die();
           return $this->renderAjax('_modal_depa', [
                        'model' => $model,
                        'facultad_id'=> $model->facultad_id,
                        'gridName'=>h::request()->get('gridName'),
                        'idModal'=>h::request()->get('idModal'),
                        //'cantidadLibres'=>$cantidadLibres,
          
            ]);  
        }
       
   } 
   
    public function actionModalNewCarrera($id){
     $this->layout = "install";
        $model = New Carreras();
        $datos=[];
        $modelFacultad= Facultades::findOne($id);
        
        if(is_null($modelFacultad)){
            //Si es error buttonSubmitWidget::OP_TERCERA
            //lanza un NOTY msg de error
            return ['success'=>\common\widgets\buttonsubmitwidget\buttonSubmitWidget::OP_TERCERA,'msg'=>$datos];
        }
        
        $model->universidad_id=$modelFacultad->universidad_id;
        $model->facultad_id=$modelFacultad->id;
        if(h::request()->isPost){
            //$model->setScenario(Rangos::SCENARIO_HORAS);
            $model->load(h::request()->post());
             h::response()->format = \yii\web\Response::FORMAT_JSON;
            $datos=\yii\widgets\ActiveForm::validate($model);
            if(count($datos)>0){
               return ['success'=>\common\widgets\buttonsubmitwidget\buttonSubmitWidget::OP_SEGUNDA,'msg'=>$datos];  
            }else{
                $model->save();
                
                  return ['success'=>\common\widgets\buttonsubmitwidget\buttonSubmitWidget::OP_PRIMERA,'id'=>$model->facultad_id];
            }
        }else{
            //var_dump($model->attributes);die();
           return $this->renderAjax('_modal_carrera', [
                        'model' => $model,
                        'facultad_id'=> $model->facultad_id,
                        'gridName'=>h::request()->get('gridName'),
                        'idModal'=>h::request()->get('idModal'),
                        //'cantidadLibres'=>$cantidadLibres,
          
            ]);  
        }
       
  }    
    public function actionModalEditCarrera($id){
     $this->layout = "install";
        $model = Carreras::findOne($id);
        $datos=[];
       
        
        if(is_null($model)){
            //Si es error buttonSubmitWidget::OP_TERCERA
            //lanza un NOTY msg de error
            return ['success'=>\common\widgets\buttonsubmitwidget\buttonSubmitWidget::OP_TERCERA,'msg'=>$datos];
        }
        
        
        if(h::request()->isPost){
            //$model->setScenario(Rangos::SCENARIO_HORAS);
            $model->load(h::request()->post());
             h::response()->format = \yii\web\Response::FORMAT_JSON;
            $datos=\yii\widgets\ActiveForm::validate($model);
            if(count($datos)>0){
               return ['success'=>\common\widgets\buttonsubmitwidget\buttonSubmitWidget::OP_SEGUNDA,'msg'=>$datos];  
            }else{
                $model->save();
                
                  return ['success'=>\common\widgets\buttonsubmitwidget\buttonSubmitWidget::OP_PRIMERA,'id'=>$model->facultad_id];
            }
        }else{
            //var_dump($model->attributes);die();
           return $this->renderAjax('_modal_carrera', [
                        'model' => $model,
                        'facultad_id'=> $model->facultad_id,
                        'gridName'=>h::request()->get('gridName'),
                        'idModal'=>h::request()->get('idModal'),
                        //'cantidadLibres'=>$cantidadLibres,
          
            ]);  
        }
       
  }  
}
