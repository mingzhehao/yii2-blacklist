<?php

use yii\db\Migration;

class m161101_102358_create_blacklist_manage extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%blacklist}}', [
            'id' => $this->primaryKey(),
            'appid' => $this->integer()->notNull(),
            'content' => $this->string(20)->notNull()->comment("黑名单(ip or uid)"),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%blacklist}}');
    }

}
