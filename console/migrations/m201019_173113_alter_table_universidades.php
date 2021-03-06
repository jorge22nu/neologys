<?php

use console\migrations\baseMigration;

/**
 * Class m201019_173113_alter_table_universidades
 */
class m201019_173113_alter_table_universidades extends baseMigration
{
    const NAME_TABLE='{{%facultades}}';
    
    public function safeUp()
    {
        $table=static::NAME_TABLE; 
        if($this->existsColumn($table,'codfac'))
           $this->alterColumn ($table, 'codfac', $this->string(20)->append($this->collateColumn())); 
     
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $table=static::NAME_TABLE;
        if($this->existsColumn($table,'codfac'))
          $this->alterColumn ($table, 'codfac', $this->string(20)->append($this->collateColumn())); 
     
     
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200908_234434_alter_personas cannot be reverted.\n";

        return false;
    }
    */
}