<?php

namespace common\models\masters;

use Yii;

/**
 * This is the model class for table "{{%grupo_parametros}}".
 *
 * @property int $id
 * @property string|null $codgrupo
 * @property string|null $descripcion
 * @property string|null $detalle
 */
class GrupoParametros extends \common\models\base\modelBase
{
   const PREFIX_ADVANCED = '/';
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%grupo_parametros}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['detalle'], 'string'],
            [['codgrupo'], 'string', 'max' => 3],
            [['descripcion'], 'string', 'max' => 40],
        ];
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
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('base_labels', 'ID'),
            'codgrupo' => Yii::t('base_labels', 'Group Code'),
            'descripcion' => Yii::t('base_labels', 'Description'),
            'detalle' => Yii::t('base_labels', 'Detail'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return GrupoParametrosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GrupoParametrosQuery(get_called_class());
    }
}
