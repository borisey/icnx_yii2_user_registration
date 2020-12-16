<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m201215_203824_create_users_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(255)->notNull(),
            'phone' => $this->integer(10)->notNull(),
            'email' => $this->string(255)->notNull(),
            'child_birthday' => $this->date()->notNull(),
            'agree' => $this->boolean()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%users}}');
    }
}