<?php
namespace backend\modules\base\database\migrations;
use yii\db\Migration;
use mdm\admin\models\User;
use backend\components\Installer;
/**
 * Class m200806_193731_fillData
 */
class m290806_193731_fillData extends Migration
{
       const NAME_TABLE_UNIVERSIDADES='{{%universidades}}';
    const NAME_TABLE_PERIODOS='{{%periodos}}';
    const NAME_TABLE_DEPARTAMENTOS='{{%departamentos}}';
    const NAME_TABLE_FACULTADES='{{%facultades}}';
    
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
       // Installer::createSettings();         
        //Installer::createBasicRole(Installer::createFirstUser());
                 
    }

    
    public static function fillDataUniversidades(){
         \Yii::$app->db->createCommand()->
             batchInsert(static::NAME_TABLE,
             ['codpais','nombre','acronimo','estado'],
             $this->getDataUniversidades())->execute();
    }
    
    private static function getDataUniversidades(){
        return [
['ES','ESCUELA SUPERIOR DE RELACIONES PUBLICAS','ES-ESRP','BARCELONA'],
['BCP','BANCO DE CREDITO DEL PERU'],
['BN','BANCO DE LA NACION'],
['SCBK','SCOTIABANK DEL PERU'],
 ['IB','INTERBANK'], 
 ['BANBIF','BANCO INTERAMERICANO DE FINAN']
            ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       //Installer::revertCreateBasicRole();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200806_193731_fillData cannot be reverted.\n";

        return false;
    }
    */
}
