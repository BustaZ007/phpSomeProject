<?php

use yii\db\Migration;

/**
 * Class m200625_082914_addUserTable
 */
class m200625_082914_addUserTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'login' => $this->string(),
            'password' => $this->string(),
            'accessToken' => $this->string()
        ]);

        $this->insert('users', [
            'login'=>'admin',
            'password'=>'admin'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200625_082914_addUserTable cannot be reverted.\n";

        return false;
    }
    */
}
