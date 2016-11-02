<?php

use yii\db\Migration;

class m161101_100314_create_project_manage extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%project}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64)->notNull(),
            'appid' => $this->integer()->notNull()->unique(),
            'appkey' => $this->string(64)->notNull(),
            'status' => $this->smallInteger()->notNull()->comment("项目是否可用 1可用 0 不可用")->defaultValue(1),
            'desc' => $this->string()->notNull()->comment("注释"),
            'belong_uid' => $this->integer()->notNull()->comment("项目所属用户"),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%project}}');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
