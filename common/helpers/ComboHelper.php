<?php
/*
 * Esta clase para ahorrar tiempo
 * Evitando escribir los combos
 */
namespace common\helpers;
use yii;
use yii\helpers\ArrayHelper;

class ComboHelper  {
    
    /*
     * Funciones que devuelven arrays para rellenar los combos
     * ma comunes de datos maestros 
     */
    
    
    
    public static function getCboMaterials(){
        return ArrayHelper::map(
                \common\models\masters\Maestrocompo::find()->all(),
                'codart','descripcion');
    }
    
    public static function getCboClipros(){
        return ArrayHelper::map(
                \common\models\masters\Clipro::find()->all(),
                'codpro','despro');
    }
    
    public static function getCboCentros(){
        return ArrayHelper::map(
                \common\models\masters\Centros::find()->all(),
                'codcen','nomcen');
    }
    
    public static function getCboTables(){
        return ArrayHelper::map(
                        \common\models\masters\ModelCombo::find()->all(),
                'parametro','parametro');
    }
    
     public static function getCboValores($tableName){
        return ArrayHelper::map(
     \common\models\masters\Combovalores::find()->where(['[[nombretabla]]'=>$tableName])->all(),
                'codigo','valor');
    }
    
     public static function getCboFavorites($iduser=null){
         $iduser=is_null($iduser)?static::userId():$iduser;        
        return ArrayHelper::map(
                        \common\models\Userfavoritos::find()->where(['[[user_id]]'=>$iduser])->all(),
                'url','alias');
    }
    
     public static function getCboDocuments($iduser=null){
         //$iduser=is_null($iduser)?static::userId():$iduser;        
        return ArrayHelper::map(
                        \common\models\masters\Documentos::find()->all(),
                'codocu','desdocu');
    }
    
    
      public static function getCboDepartamentos(){
         //$iduser=is_null($iduser)?static::userId():$iduser;        
        return ArrayHelper::map(
                        \common\models\masters\Ubigeos::find()->
                all(),
            'coddepa','departamento');
      }
        
       public static function getCboProvincias($depa){
         //$iduser=is_null($iduser)?static::userId():$iduser;        
        return ArrayHelper::map(
                        \common\models\masters\Ubigeos::find()
                ->where(['coddepa'=>$depa])->all(),
                'codprov','provincia');
    }
    
     public static function getCboDistritos($prov){
         //$iduser=is_null($iduser)?static::userId():$iduser;        
        return ArrayHelper::map(
                        \common\models\masters\Ubigeos::find()
                ->where(['codprov'=>$prov])->all(),
                'coddist','distrito');
    }
    
    /*ESTA FUNCION ES DE PRPISTO GENERAL 
     * RECIBE EL NOBRE DE UNA CLASE 
     * CON EL CAMO CLAVE Y CAMPO REFERENCIA
     * Y UN VALOR DE FILTRO  Y CON ESTO DEVUEL UN ARRAY D
     * DE VALORES 
     */
    public static function getCboGeneral($valorfiltro,$clase,$campofiltro,$campokey,$camporef){
         //$iduser=is_null($iduser)?static::userId():$iduser;   
           //$iduser=is_null($iduser)?static::userId():$iduser;   
        if(empty($campofiltro))
            return ArrayHelper::map(
                        $clase::find()->all(),
                $campokey,$camporef);
        return ArrayHelper::map(
                        $clase::find()->where([$campofiltro=>$valorfiltro])->all(),
                $campokey,$camporef);
    }
    
    
    
    
   /*
    * Obtiene todos los nombres de los modelos de la aplicacion
    */
    public static function getCboModels(){
             
       /* return array_combine(
                        \common\helpers\FileHelper::getModels(),
                \common\helpers\FileHelper::getModels());*/
        $paths= \common\helpers\FileHelper::getModels();
             return self::map_models($paths);
    }
    
    
     /*
    * Obtiene todos los nombres de los modelos de un modulo
    */
    public static function getCboModelsByModule($moduleName){
             $paths=\common\helpers\FileHelper::getModelsByModule($moduleName);
             return self::map_models($paths);
        /*return array_combine(
                        \common\helpers\FileHelper::getModelsByModule($moduleName),
                \common\helpers\FileHelper::getModelsByModule($moduleName));*/
    }
    
    /*Funcion que arregla las rutas con los nombres de las tablas
     * 
     */
    
    private function map_models($paths){
       /*$paths=(!is_null($moduleName))?\common\helpers\FileHelper::getModelsByModule($moduleName):
         \common\helpers\FileHelper::getModels();
        */
        $models=[];
        foreach($paths as $clave=>$valor){
            $models[$valor]=\common\helpers\FileHelper::getShortName($valor);
        }
        asort($models);
      
       return $models;
      
    }
    
     /*
    * Obtiene todos los nombres de los modelos de la aplicacion
    */
    public static function getCboRoles(){
           $roles= array_keys(yii::$app->authManager->getRoles());
        return array_combine($roles,$roles);
    }
   
    /*
     * Obtiene los valores masters de la tabla combovalores
     * @key: clave para filtrar los datos 
     * @codcentro: Opcional para filtrar un parametro que depende del centro 
     */
    public static function getTablesValues($key,$codcentro=null){
       // echo \common\models\masters\Combovalores::find()->where(['[[nombretabla]]'=> strtolower($key)])->createCommand()->getRawSql();die();
        if(is_null($codcentro))
        return ArrayHelper::map(
       \common\models\masters\Combovalores::find()->where(['[[nombretabla]]'=> strtolower($key)])->all(),
               'codigo','valor');
       return ArrayHelper::map(
       \common\models\masters\Combovalores::find()->where(
               [
                   '[[nombretabla]]'=> strtolower(trim($key)),
                   '[[codcen]]'=>trim($codcentro)
                   ])->all(),
               'codigo','valor');  
        
   }
   
   
   
    /*
    * Obtiene todos los nombres de los modelos de la aplicacion
    */
    public static function getCboUms(){
         return ArrayHelper::map(
                        \common\models\masters\Ums::find()->all(),
                'codum','desum');
    }
   
   public static function getCboSex(){
         return [
                'M'=>yii::t('base_labels','Male'),
                'F'=>yii::t('base_labels','Female'),
                'G'=>yii::t('base_labels','General'),
                ];
    }
    
    public static function getCboEstCivil(){
         return [
                'S'=>yii::t('base_labels','Single'),
                'C'=>yii::t('base_labels','Married'),
                ];
    }
    
     public static function getCboBancos(){
         return ArrayHelper::map(
                        \common\models\masters\Bancos::find()->all(),
                'id','nombre');
    }
    
    public static function getCboMonedas(){
         return ArrayHelper::map(
                        \common\models\masters\Monedas::find()->all(),
                'codmon','codmon');
    }
    
     /*
      * Obtiene los valores de los camos de un modelo
      * solo hay que darlela ruta del nombre de la clase 
      */
    public function getCboCamposFromTable($nombreclase){
        $modelo=new $nombreclase();
        $valores=[];
        foreach(array_keys($modelo->attributes) as $key=>$attribute){
            $valores[$attribute]=$modelo->getAttributeLabel($attribute);
        }
        return $valores;
    }
    
    
    
    
    public function getCboPaises(){
  return [
'AF'	=>	yii::t('base.paises','Afghanistan'),
'AL'	=>	yii::t('base.paises','Albania'),
'DZ'	=>	yii::t('base.paises','Algeria'),
'AS'	=>	yii::t('base.paises','American Samoa'),
'AD'	=>	yii::t('base.paises','Andorra'),
'AO'	=>	yii::t('base.paises','Angola'),
'AI'	=>	yii::t('base.paises','Anguilla'),
'AQ'	=>	yii::t('base.paises','Antarctica'),
'AG'	=>	yii::t('base.paises','Antigua and Barbuda'),
'AR'	=>	yii::t('base.paises','Argentina'),
'AM'	=>	yii::t('base.paises','Armenia'),
'AW'	=>	yii::t('base.paises','Aruba'),
'AU'	=>	yii::t('base.paises','Australia'),
'AT'	=>	yii::t('base.paises','Austria'),
'AZ'	=>	yii::t('base.paises','Azerbaijan'),
'BS'	=>	yii::t('base.paises','Bahamas (the)'),
'BH'	=>	yii::t('base.paises','Bahrain'),
'BD'	=>	yii::t('base.paises','Bangladesh'),
'BB'	=>	yii::t('base.paises','Barbados'),
'BY'	=>	yii::t('base.paises','Belarus'),
'BE'	=>	yii::t('base.paises','Belgium'),
'BZ'	=>	yii::t('base.paises','Belize'),
'BJ'	=>	yii::t('base.paises','Benin'),
'BM'	=>	yii::t('base.paises','Bermuda'),
'BT'	=>	yii::t('base.paises','Bhutan'),
'BO'	=>	yii::t('base.paises','Bolivia'),
'BQ'	=>	yii::t('base.paises','Bonaire'),
'BA'	=>	yii::t('base.paises','Bosnia and Herzegovina'),
'BW'	=>	yii::t('base.paises','Botswana'),
'BV'	=>	yii::t('base.paises','Bouvet Island'),
'BR'	=>	yii::t('base.paises','Brazil'),
'IO'	=>	yii::t('base.paises','British Indian Ocean Territory (the)'),
'BN'	=>	yii::t('base.paises','Brunei Darussalam'),
'BG'	=>	yii::t('base.paises','Bulgaria'),
'BF'	=>	yii::t('base.paises','Burkina Faso'),
'BI'	=>	yii::t('base.paises','Burundi'),
'CV'	=>	yii::t('base.paises','Cabo Verde'),
'KH'	=>	yii::t('base.paises','Cambodia'),
'CM'	=>	yii::t('base.paises','Cameroon'),
'CA'	=>	yii::t('base.paises','Canada'),
'KY'	=>	yii::t('base.paises','Cayman Islands (the)'),
'CF'	=>	yii::t('base.paises','Central African Republic (the)'),
'TD'	=>	yii::t('base.paises','Chad'),
'CL'	=>	yii::t('base.paises','Chile'),
'CN'	=>	yii::t('base.paises','China'),
'CX'	=>	yii::t('base.paises','Christmas Island'),
'CC'	=>	yii::t('base.paises','Cocos (Keeling) Islands (the)'),
'CO'	=>	yii::t('base.paises','Colombia'),
'KM'	=>	yii::t('base.paises','Comoros (the)'),
'CD'	=>	yii::t('base.paises','Congo (the Democratic Republic of the)'),
'CG'	=>	yii::t('base.paises','Congo (the)'),
'CK'	=>	yii::t('base.paises','Cook Islands (the)'),
'CR'	=>	yii::t('base.paises','Costa Rica'),
'HR'	=>	yii::t('base.paises','Croatia'),
'CU'	=>	yii::t('base.paises','Cuba'),
'CW'	=>	yii::t('base.paises','Curaçao'),
'CY'	=>	yii::t('base.paises','Cyprus'),
'CZ'	=>	yii::t('base.paises','Czechia'),
'DK'	=>	yii::t('base.paises','Denmark'),
'DJ'	=>	yii::t('base.paises','Djibouti'),
'DM'	=>	yii::t('base.paises','Dominica'),
'DO'	=>	yii::t('base.paises','Dominican Republic (the)'),
'EC'	=>	yii::t('base.paises','Ecuador'),
'EG'	=>	yii::t('base.paises','Egypt'),
'SV'	=>	yii::t('base.paises','El Salvador'),
'GQ'	=>	yii::t('base.paises','Equatorial Guinea'),
'ER'	=>	yii::t('base.paises','Eritrea'),
'EE'	=>	yii::t('base.paises','Estonia'),
'SZ'	=>	yii::t('base.paises','Eswatini'),
'ET'	=>	yii::t('base.paises','Ethiopia'),
'FK'	=>	yii::t('base.paises','Falkland Islands (the) [Malvinas]'),
'FO'	=>	yii::t('base.paises','Faroe Islands (the)'),
'FJ'	=>	yii::t('base.paises','Fiji'),
'FI'	=>	yii::t('base.paises','Finland'),
'FR'	=>	yii::t('base.paises','France'),
'GF'	=>	yii::t('base.paises','French Guiana'),
'PF'	=>	yii::t('base.paises','French Polynesia'),
'GA'	=>	yii::t('base.paises','Gabon'),
'GM'	=>	yii::t('base.paises','Gambia (the)'),
'GE'	=>	yii::t('base.paises','Georgia'),
'DE'	=>	yii::t('base.paises','Germany'),
'GH'	=>	yii::t('base.paises','Ghana'),
'GI'	=>	yii::t('base.paises','Gibraltar'),
'GR'	=>	yii::t('base.paises','Greece'),
'GL'	=>	yii::t('base.paises','Greenland'),
'GD'	=>	yii::t('base.paises','Grenada'),
'GP'	=>	yii::t('base.paises','Guadeloupe'),
'GU'	=>	yii::t('base.paises','Guam'),
'GT'	=>	yii::t('base.paises','Guatemala'),
'GG'	=>	yii::t('base.paises','Guernsey'),
'GN'	=>	yii::t('base.paises','Guinea'),
'GW'	=>	yii::t('base.paises','Guinea-Bissau'),
'GY'	=>	yii::t('base.paises','Guyana'),
'HT'	=>	yii::t('base.paises','Haiti'),
'HM'	=>	yii::t('base.paises','Heard Island and McDonald Islands'),
'VA'	=>	yii::t('base.paises','Holy See (the)?'),
'HN'	=>	yii::t('base.paises','Honduras'),
'HK'	=>	yii::t('base.paises','Hong Kong'),
'HU'	=>	yii::t('base.paises','Hungary'),
'IS'	=>	yii::t('base.paises','Iceland'),
'IN'	=>	yii::t('base.paises','India'),
'ID'	=>	yii::t('base.paises','Indonesia'),
'IR'	=>	yii::t('base.paises','Iran'),
'IQ'	=>	yii::t('base.paises','Iraq'),
'IE'	=>	yii::t('base.paises','Ireland'),
'IM'	=>	yii::t('base.paises','Isle of Man'),
'IL'	=>	yii::t('base.paises','Israel'),
'IT'	=>	yii::t('base.paises','Italy'),
'JM'	=>	yii::t('base.paises','Jamaica'),
'JP'	=>	yii::t('base.paises','Japan'),
'JE'	=>	yii::t('base.paises','Jersey'),
'JO'	=>	yii::t('base.paises','Jordan'),
'KZ'	=>	yii::t('base.paises','Kazakhstan'),
'KE'	=>	yii::t('base.paises','Kenya'),
'KI'	=>	yii::t('base.paises','Kiribati'),
'KP'	=>	yii::t('base.paises','Korea (the Democratic People\'s Republic of)?[o]'),
'KR'	=>	yii::t('base.paises','Korea (the Republic of)?[p]'),
'KW'	=>	yii::t('base.paises','Kuwait'),
'KG'	=>	yii::t('base.paises','Kyrgyzstan'),
'LA'	=>	yii::t('base.paises','Lao People\'s Democratic Republic (the)?[q]'),
'LV'	=>	yii::t('base.paises','Latvia'),
'LB'	=>	yii::t('base.paises','Lebanon'),
'LS'	=>	yii::t('base.paises','Lesotho'),
'LR'	=>	yii::t('base.paises','Liberia'),
'LY'	=>	yii::t('base.paises','Libya'),
'LI'	=>	yii::t('base.paises','Liechtenstein'),
'LT'	=>	yii::t('base.paises','Lithuania'),
'LU'	=>	yii::t('base.paises','Luxembourg'),
'MO'	=>	yii::t('base.paises','Macao?[r]'),
'MK'	=>	yii::t('base.paises','North Macedonia?[s]'),
'MG'	=>	yii::t('base.paises','Madagascar'),
'MW'	=>	yii::t('base.paises','Malawi'),
'MY'	=>	yii::t('base.paises','Malaysia'),
'MV'	=>	yii::t('base.paises','Maldives'),
'ML'	=>	yii::t('base.paises','Mali'),
'MT'	=>	yii::t('base.paises','Malta'),
'MH'	=>	yii::t('base.paises','Marshall Islands (the)'),
'MQ'	=>	yii::t('base.paises','Martinique'),
'MR'	=>	yii::t('base.paises','Mauritania'),
'MU'	=>	yii::t('base.paises','Mauritius'),
'YT'	=>	yii::t('base.paises','Mayotte'),
'MX'	=>	yii::t('base.paises','Mexico'),
'FM'	=>	yii::t('base.paises','Micronesia (Federated States of)'),
'MD'	=>	yii::t('base.paises','Moldova (the Republic of)'),
'MC'	=>	yii::t('base.paises','Monaco'),
'MN'	=>	yii::t('base.paises','Mongolia'),
'ME'	=>	yii::t('base.paises','Montenegro'),
'MS'	=>	yii::t('base.paises','Montserrat'),
'MA'	=>	yii::t('base.paises','Morocco'),
'MZ'	=>	yii::t('base.paises','Mozambique'),
'MM'	=>	yii::t('base.paises','Myanmar?[t]'),
'NA'	=>	yii::t('base.paises','Namibia'),
'NR'	=>	yii::t('base.paises','Nauru'),
'NP'	=>	yii::t('base.paises','Nepal'),
'NL'	=>	yii::t('base.paises','Netherlands (the)'),
'NC'	=>	yii::t('base.paises','New Caledonia'),
'NZ'	=>	yii::t('base.paises','New Zealand'),
'NI'	=>	yii::t('base.paises','Nicaragua'),
'NE'	=>	yii::t('base.paises','Niger (the)'),
'NG'	=>	yii::t('base.paises','Nigeria'),
'NU'	=>	yii::t('base.paises','Niue'),
'NF'	=>	yii::t('base.paises','Norfolk Island'),
'MP'	=>	yii::t('base.paises','Northern Mariana Islands (the)'),
'NO'	=>	yii::t('base.paises','Norway'),
'OM'	=>	yii::t('base.paises','Oman'),
'PK'	=>	yii::t('base.paises','Pakistan'),
'PW'	=>	yii::t('base.paises','Palau'),
'PS'	=>	yii::t('base.paises','Palestine, State of'),
'PA'	=>	yii::t('base.paises','Panama'),
'PG'	=>	yii::t('base.paises','Papua New Guinea'),
'PY'	=>	yii::t('base.paises','Paraguay'),
'PE'	=>	yii::t('base.paises','Peru'),
'PH'	=>	yii::t('base.paises','Philippines (the)'),
'PN'	=>	yii::t('base.paises','Pitcairn?[u]'),
'PL'	=>	yii::t('base.paises','Poland'),
'PT'	=>	yii::t('base.paises','Portugal'),
'PR'	=>	yii::t('base.paises','Puerto Rico'),
'QA'	=>	yii::t('base.paises','Qatar'),
'RE'	=>	yii::t('base.paises','Réunion'),
'RO'	=>	yii::t('base.paises','Romania'),
'RU'	=>	yii::t('base.paises','Russian Federation (the)?[v]'),
'RW'	=>	yii::t('base.paises','Rwanda'),
'BL'	=>	yii::t('base.paises','Saint Barthélemy'),
'SH'	=>	yii::t('base.paises','Saint Helena'),
'KN'	=>	yii::t('base.paises','Saint Kitts and Nevis'),
'LC'	=>	yii::t('base.paises','Saint Lucia'),
'MF'	=>	yii::t('base.paises','Saint Martin (French part)'),
'PM'	=>	yii::t('base.paises','Saint Pierre and Miquelon'),
'VC'	=>	yii::t('base.paises','Saint Vincent and the Grenadines'),
'WS'	=>	yii::t('base.paises','Samoa'),
'SM'	=>	yii::t('base.paises','San Marino'),
'ST'	=>	yii::t('base.paises','Sao Tome and Principe'),
'SA'	=>	yii::t('base.paises','Saudi Arabia'),
'SN'	=>	yii::t('base.paises','Senegal'),
'RS'	=>	yii::t('base.paises','Serbia'),
'SC'	=>	yii::t('base.paises','Seychelles'),
'SL'	=>	yii::t('base.paises','Sierra Leone'),
'SG'	=>	yii::t('base.paises','Singapore'),
'SX'	=>	yii::t('base.paises','Sint Maarten (Dutch part)'),
'SK'	=>	yii::t('base.paises','Slovakia'),
'SI'	=>	yii::t('base.paises','Slovenia'),
'SB'	=>	yii::t('base.paises','Solomon Islands'),
'SO'	=>	yii::t('base.paises','Somalia'),
'ZA'	=>	yii::t('base.paises','South Africa'),
'GS'	=>	yii::t('base.paises','South Georgia and the South Sandwich Islands'),
'SS'	=>	yii::t('base.paises','South Sudan'),
'ES'	=>	yii::t('base.paises','Spain'),
'LK'	=>	yii::t('base.paises','Sri Lanka'),
'SD'	=>	yii::t('base.paises','Sudan (the)'),
'SR'	=>	yii::t('base.paises','Suriname'),
'SJ'	=>	yii::t('base.paises','Svalbard'),
'SE'	=>	yii::t('base.paises','Sweden'),
'CH'	=>	yii::t('base.paises','Switzerland'),
'SY'	=>	yii::t('base.paises','Syrian Arab Republic (the)?[x]'),
'TW'	=>	yii::t('base.paises','Taiwan (Province of China)?[y]'),
'TJ'	=>	yii::t('base.paises','Tajikistan'),
'TZ'	=>	yii::t('base.paises','Tanzania, the United Republic of'),
'TH'	=>	yii::t('base.paises','Thailand'),
'TL'	=>	yii::t('base.paises','Timor-Leste?[aa]'),
'TG'	=>	yii::t('base.paises','Togo'),
'TK'	=>	yii::t('base.paises','Tokelau'),
'TO'	=>	yii::t('base.paises','Tonga'),
'TT'	=>	yii::t('base.paises','Trinidad and Tobago'),
'TN'	=>	yii::t('base.paises','Tunisia'),
'TR'	=>	yii::t('base.paises','Turkey'),
'TM'	=>	yii::t('base.paises','Turkmenistan'),
'TC'	=>	yii::t('base.paises','Turks and Caicos Islands (the)'),
'TV'	=>	yii::t('base.paises','Tuvalu'),
'UG'	=>	yii::t('base.paises','Uganda'),
'UA'	=>	yii::t('base.paises','Ukraine'),
'AE'	=>	yii::t('base.paises','United Arab Emirates (the)'),
'GB'	=>	yii::t('base.paises','United Kingdom of Great Britain and Northern Ireland (the)'),
'UM'	=>	yii::t('base.paises','United States Minor Outlying Islands (the)?[ac]'),
'US'	=>	yii::t('base.paises','United States of America (the)'),
'UY'	=>	yii::t('base.paises','Uruguay'),
'UZ'	=>	yii::t('base.paises','Uzbekistan'),
'VU'	=>	yii::t('base.paises','Vanuatu'),
'VE'	=>	yii::t('base.paises','Venezuela (Bolivarian Republic of)'),
'VN'	=>	yii::t('base.paises','Viet Nam?[ae]'),
'VG'	=>	yii::t('base.paises','Virgin Islands (British)?[af]'),
'VI'	=>	yii::t('base.paises','Virgin Islands (U.S.)?[ag]'),
'WF'	=>	yii::t('base.paises','Wallis and Futuna'),
'EH'	=>	yii::t('base.paises','Western Sahara?[ah]'),
'YE'	=>	yii::t('base.paises','Yemen'),
'ZM'	=>	yii::t('base.paises','Zambia'),
'ZW'	=>	yii::t('base.paises','Zimbabwe'),



];
    }
    
  public static function getCboFacultades($universidad_id=null){
      $query= \common\models\masters\Facultades::find();
      if(!is_null($universidad_id)){
          $query->andWhere(['universidad_id'=>$universidad_id]);
      }
        return ArrayHelper::map(
                       $query->all(),
                'id','desfac');
    }  
  public static function getCboUniversidades(){
      
        return ArrayHelper::map(
                        \common\models\masters\Universidades::find()->all(),
                'id','nombre');
    } 
    
    public static function getCboDepartamentosFacu($idfac=null){
         //$iduser=is_null($iduser)?static::userId():$iduser;  
          $query= \common\models\masters\Departamentos::find();
          if(!is_null($idfac)){
              $query->andWhere(['facultad_id'=>$idfac]);
          }
                
        return ArrayHelper::map(
                        $query->all(),
            'id','nombredepa');
      } 
    
   public static function getCboPeriodos(){
        return ArrayHelper::map(
                        \common\models\masters\Periodos::find()->all(),
                'codperiodo','periodo');
    }  
    
  
   public static function getCboCarreras($facultad_id=null){
      $query= \common\models\masters\Carreras::find();
      if(!is_null($facultad_id)){
          $query->andWhere(['facultad_id'=>$facultad_id]);
      }
        return ArrayHelper::map(
                       $query->all(),
                'id','nombre');
    } 
    
     public static function getCboCardinales($entero){
         $valores=[];
            for ($i = 1; $i <= $entero; $i++) {
                $valores[$i]=$i;
            }
            return $valores;
      } 
   
      
          public function getCboIdiomas(){
  return [
'es'	=>	yii::t('base_labels','Spanish'),
'en'	=>	yii::t('base_labels','English'),
'fr'	=>	yii::t('base_labels','French'),
'it'	=>	yii::t('base_labels','Italian'),
'de'	=>	yii::t('base_labels','German'),
];
    }
    
  public function getIdioma($idioma){
     return self::getCboIdiomas()[$idioma];
  } 
  
  public function getCountry($pais){
     return self::getCboPaises()[$pais];
  } 
    
    public function getCboNumeros($cantidad){
        $datos=[];
         for( $i= 1 ; $i <= $cantidad ; $i++ ){
             $datos[$i]=$i;
         }
        return $datos;
    }
    
    public static function getCboGrupoPersonas(){
       
      
          //$query->andWhere(['facultad_id'=>$facultad_id]);
     
        return ArrayHelper::map(
                        \common\models\masters\GrupoPersonas::find()->select(['codgrupo','desgrupo'])->all(),
                'codgrupo','desgrupo');
    }  
    
}