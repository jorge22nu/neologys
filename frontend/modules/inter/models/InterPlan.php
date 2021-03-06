<?php
namespace frontend\modules\inter\models;
use common\models\masters\Universidades;
use common\models\masters\Facultades;
use common\models\masters\Departamentos;
use common\models\masters\Periodos;
use common\models\masters\Carreras;
use common\models\masters\Personas;
use frontend\modules\inter\Module as m;


use Yii;

/**
 * This is the model class for table "{{%inter_plan}}".
 *
 * @property int $id
 * @property int|null $universidad_id
 * @property int|null $facultad_id
 * @property int|null $depa_id
 * @property int|null $eval_id
 * @property int|null $modo_id
 * @property int|null $programa_id
 * @property string $clase
 * @property string $status
 * @property string $codocu
 * @property string $acronimo
 * @property string $descripcion
 * @property string|null $detalles
 *
 * @property InterEvaluadores $eval
 * @property Facultades $facultad
 * @property InterModos $modo
 * @property Departamentos $depa
 * @property Universidades $universidad
 */
class InterPlan extends \common\models\base\modelBase
{
     public $dateorTimeFields = [
        //'cumple' => self::_FDATE,
        'finicio' => self::_FDATE,
        //'ftermino' => self::_FDATETIME
    ];
    
     public $booleanFields=['notificamail'];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%inter_plan}}';
    }
 public function behaviors() {
        return [
           
            
             'auditoriaBehavior' => [ 
                'class' => '\common\behaviors\AuditBehavior',
            ],
            
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['universidad_id', 'facultad_id', 'depa_id', 'eval_id', 'modo_id', 'programa_id'], 'integer'],
            [['acronimo', 'descripcion'], 'required'],
            [['detalles'], 'string'],
             [['finicio','notificamail'], 'safe'],
             [['orden','requisito_id','etapa_id','ordenetapa'], 'safe'],
            [['clase', 'status'], 'string', 'max' => 1],
            [['codocu'], 'string', 'max' => 3],
            [['acronimo', 'descripcion'], 'string', 'max' => 40],
            [['eval_id'], 'exist', 'skipOnError' => true, 'targetClass' => InterEvaluadores::className(), 'targetAttribute' => ['eval_id' => 'id']],
            [['facultad_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\masters\Facultades::className(), 'targetAttribute' => ['facultad_id' => 'id']],
            [['modo_id'], 'exist', 'skipOnError' => true, 'targetClass' => InterModos::className(), 'targetAttribute' => ['modo_id' => 'id']],
            [['depa_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\masters\Departamentos::className(), 'targetAttribute' => ['depa_id' => 'id']],
            [['universidad_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\masters\Universidades::className(), 'targetAttribute' => ['universidad_id' => 'id']],
            //[['universidad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Universidades::className(), 'targetAttribute' => ['universidad_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => m::t('labels', 'ID'),
            'universidad_id' => m::t('labels', 'Universidad ID'),
            'facultad_id' => m::t('labels', 'Facultad ID'),
            'depa_id' => m::t('labels', 'Depa ID'),
            'eval_id' => m::t('labels', 'Evaluator Id'),
            'modo_id' => m::t('labels', 'Mode ID'),
            'programa_id' => m::t('labels', 'Program'),
            'clase' => m::t('labels', 'Class'),
            'status' => m::t('labels', 'Status'),
            'codocu' => m::t('labels', 'Document Code'),
            'acronimo' => m::t('labels', 'Acronym'),
            'descripcion' => m::t('labels', 'Description'),
            'detalles' => m::t('labels', 'Details'),
        ];
    }

    /**
     * Gets query for [[Eval]].
     *
     * @return \yii\db\ActiveQuery|InterEvaluadoresQuery
     */
    public function getEval()
    {
        return $this->hasOne(InterEvaluadores::className(), ['id' => 'eval_id']);
    }

    
    public function getDocumento()
    {
        return $this->hasOne(\common\models\masters\Documentos::className(), ['codocu' => 'codocu']);
    }
    /**
     * Gets query for [[Facultad]].
     *
     * @return \yii\db\ActiveQuery|FacultadesQuery
     */
    public function getFacultad()
    {
        return $this->hasOne(\common\models\masters\Facultades::className(), ['id' => 'facultad_id']);
    }
    
     

    /**
     * Gets query for [[Modo]].
     *
     * @return \yii\db\ActiveQuery|InterModosQuery
     */
    public function getModo()
    {
        return $this->hasOne(InterModos::className(), ['id' => 'modo_id']);
    }

    /**
     * Gets query for [[Depa]].
     *
     * @return \yii\db\ActiveQuery|DepartamentosQuery
     */
    public function getDepa()
    {
        return $this->hasOne(\common\models\masters\Departamentos::className(), ['id' => 'depa_id']);
    }
     
    

    /**
     * Gets query for [[Universidad]].
     *
     * @return \yii\db\ActiveQuery|UniversidadesQuery
     */
    public function getUniversidad()
    {
        return $this->hasOne(\common\models\masters\Universidades::className(), ['id' => 'universidad_id']);
    }
     public function getPrograma()
    {
        return $this->hasOne(InterPrograma::className(), ['id' => 'programa_id']);
    }

    public function getEtapa()
    {
        return $this->hasOne(InterEtapas::className(), ['id' => 'etapa_id']);
    }
    
    public function getHorarios()
    {
        return $this->hasMany(InterHorarios::className(), ['plan_id' => 'id']);
    }
    
    
    public function getEntrevistas()
    {
        return $this->hasMany(InterEntrevistas::className(), ['plan_id' => 'id']);
    }
    /**
     * {@inheritdoc}
     * @return InterPlanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InterPlanQuery(get_called_class());
    }
    
    public function requisitosPosibles(){
       Return \yii\helpers\ArrayHelper::map(self::find()->select(['id','descripcion'])->andWhere([
            'programa_id'=>$this->programa_id,
            'modo_id'=>$this->modo_id,
        ])->andWhere(['<>','id',$this->id])->asArray(),
             'id','descripcion');
    }
    
    public function beforeSave($insert) {
        $this->ordenetapa= InterEtapas::findOne($this->etapa_id)->orden;
        return parent::beforeSave($insert);
    }
    
    public function eventsToCalendar(){
        $horarios=$this->getHorarios()->andWhere(['activo'=>'1'])->all();
        $eventos=[];
        foreach($horarios as $horario){
           $eventos[]=$horario->eventToCalendar();
        }
        return $eventos;
      }
      
    public function generateRangos(){
       $diasWeek= \common\helpers\timeHelper::daysOfWeek();
       $programa=$this->programa;
       foreach($diasWeek as $ndia=>$namedia){
           InterHorarios::firstOrCreateStatic(
                   [
                     'plan_id'=>$this->id,
                      'dia'=>$ndia ,
                      'nombredia'=>$namedia ,
                       'programa_id'=>$programa->id,
                       'facultad_id'=>$programa->facultad_id,
                       'etapa_id'=>$this->etapa_id,
                       'hinicio'=>'09:00',
                       'hfin'=>'17:00',
                       'tolerancia'=>0.1,
                       'activo'=>false,
                       'skipferiado'=>false,
                       
                   ], 
                   null,
                   ['plan_id'=>$this->id,'dia'=>$ndia]);
       }
    }  
      
    public function populateEntrevistas(){
        $entrevs=[];
        foreach($this->entrevistas as $entrevista){
           $entrevs[]=$entrevista; 
        }
        return $entrevs; 
    }
    
    public function populateEventosToCalendar($code=null){
        $entrevistas=$this->populateEntrevistas();
        $entrevs=[];
        foreach($entrevistas as $entrevista){
           $entrevs[]=$entrevista->range()->
              toEventCalendar($entrevista->codigo,$entrevista->id,['botonAbre'],$code); 
        }
        unset($entrevistas);
        return $entrevs;
    }
    
    /*rETORNA UN ARRA DE MODEL DE HORARIOS DE ESE DIA */
    
   public function horariosToDay($dayOrCarbon){
       if(is_numeric($day))
       return $this->getHorarios()->andWhere(['dia'=>$dia])->all();
       if($dayOrCarbon instanceof \Carbon\Carbon){
        return $this->getHorarios()->andWhere(['dia'=>$dayOrCarbon->dayOfWeek])->all();   
       }
   }
   
   public function rangoToDay($carbon){
     $horario=$this->getHorarios()->andWhere([
         'dia'=>$carbon->dayOfWeek,
         'activo'=>'1'
         ])->one();
     /*echo $this->getHorarios()->andWhere([
         'dia'=>$carbon->dayOfWeek,
         'activo'=>'1'
         ])->createCommand()->rawSql;die();*/
     if(is_null($horario))return null;
     return $horario->rangesToDay($carbon);
   }
    
}
