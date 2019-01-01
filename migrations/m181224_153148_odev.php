<?php

use yii\db\Migration;

/**
 * Class m181224_153148_odev
 */
class m181224_153148_odev extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {

        
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $TABLE_NAME = 'odev';
        $this->createTable($TABLE_NAME, [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'content' => $this->text()->notNull(),
            'userid' => $this->integer()->notNull(),
            'categoryid' => $this->integer()->notNull(),
            'status' => "ENUM('active', 'passive')",
            'startdate' => $this->dateTime()->notNull(),
            'enddate' => $this->dateTime()->notNull(),
            'modified' => $this->dateTime()->notNull()
        ], $tableOptions);



       
        $TABLE_NAME = 'odevcategory';

        $this->createTable($TABLE_NAME, [
            'id' => $this->primaryKey(),
            'categorytitle' => $this->string(128)->notNull(),
        ],'ENGINE=InnoDB DEFAULT CHARSET=utf8mb4');





    }



    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        $this->dropTable('odev');
        $this->dropTable('odevcategory');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181224_153148_odev cannot be reverted.\n";

        return false;
    }
    */
}
