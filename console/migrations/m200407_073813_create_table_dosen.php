<?php

use yii\db\Migration;

/**
 * Class m200407_073813_create_table_dosen
 */
class m200407_073813_create_table_dosen extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('dosen',[

            'dosen_id'=>$this->primaryKey(),
            'nama_dosen'=> $this->string(50)
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200407_073813_create_table_dosen cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200407_073813_create_table_dosen cannot be reverted.\n";

        return false;
    }
    */
}
