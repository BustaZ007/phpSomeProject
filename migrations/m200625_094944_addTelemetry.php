<?php

use yii\db\Migration;

/**
 * Class m200625_094944_addTelemetry
 */
class m200625_094944_addTelemetry extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('telemetry', [
            'id' => $this->primaryKey(),
            'time' => $this->string(),
            'telemetry_string' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('telemetry');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200625_094944_addTelemetry cannot be reverted.\n";

        return false;
    }
    */
}
