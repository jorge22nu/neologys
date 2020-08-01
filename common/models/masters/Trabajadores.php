<?php

namespace common\models\masters;
use common\interfaces\identidadesInterface;
use common\interfaces\PersonInterface;
use Yii;

/**
 * This is the model class for table "{{%trabajadores}}".
 *
 * @property int $id
 * @property string $ap
 * @property string $am
 * @property string $nombres
 * @property string|null $numerodoc
 * @property string|null $tipodoc
 * @property string|null $fingreso
 * @property string|null $detalles
 * @property string|null $correo
 * @property string|null $codtra
 * @property int|null $persona_id
 * @property string|null $codigoper
 * @property string|null $codcargo
 */
class Trabajadores extends \common\models\base\modelBase
implements identidadesInterface, PersonInterface
{
    
   public $persona=null;
    
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%trabajadores}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ap', 'am', 'nombres'], 'required'],
            [['detalles'], 'string'],
            [['persona_id'], 'integer'],
            [['ap', 'am', 'nombres'], 'string', 'max' => 40],
            [['numerodoc'], 'string', 'max' => 20],
            [['tipodoc'], 'string', 'max' => 2],
            [['fingreso', 'codtra'], 'string', 'max' => 10],
            [['correo'], 'string', 'max' => 80],
            [['codigoper', 'codcargo'], 'string', 'max' => 8],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('base.labels', 'ID'),
            'ap' => Yii::t('base.labels', 'Ap'),
            'am' => Yii::t('base.labels', 'Am'),
            'nombres' => Yii::t('base.labels', 'Nombres'),
            'numerodoc' => Yii::t('base.labels', 'Numerodoc'),
            'tipodoc' => Yii::t('base.labels', 'Tipodoc'),
            'fingreso' => Yii::t('base.labels', 'Fingreso'),
            'detalles' => Yii::t('base.labels', 'Detalles'),
            'correo' => Yii::t('base.labels', 'Correo'),
            'codtra' => Yii::t('base.labels', 'Codtra'),
            'persona_id' => Yii::t('base.labels', 'Persona ID'),
            'codigoper' => Yii::t('base.labels', 'Codigoper'),
            'codcargo' => Yii::t('base.labels', 'Codcargo'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return TrabajadoresQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TrabajadoresQuery(get_called_class());
    }
    
    
    /*
     * Crea un registro de persona 
     */
    private function createPersonFromThis(){
        
    }
 
    
 public function getPersona(){
     
    return ($this->persona_id>0)? Personas::findOne($this->persona_id):null;
 }
 public function setPersona(PersonInterface $persona){
     $this->persona=$persona;
 }  
    
  
public function sincronizeCommonFields(){
    
  }
    
private function existsPerson($numerodocu){
    
  $query=Personas::find()->andWhere([
      'numerodoc'=>$numerodocu
          ]);
  if($query->exists()){
      
  }else{
      
  }
}

private function hasHomonimo(){
    
  $query=Personas::find()->andWhere([
      'numerodoc'=>$numerodocu
          ]);
  if($query->exists()){
      
  }else{
      
  }
}

public function findByDoc($codocu,$numdoc){
    
   }

 
 public function fullName($asc=TRUE,$ucase=true){
     
 }
 
    public function lastName();
    public function age();
    public function docsIdentity();  
    public function address();
    public function fenac();
    public function IsBirthDay();
    public function name(); 
}
