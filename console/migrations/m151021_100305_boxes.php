<?php

use yii\db\Migration;

class m151021_100305_boxes extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%boxes}}', [
            'id' => $this->primaryKey(),
            'sys_name' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'title' => $this->string()->notNull(),
            'text' => $this->text()->notNull(),
            'image' => $this->text()->notNull(),
            'link' => $this->text()->notNull(),
            'publish' => $this->integer(1)->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull()
        ], $tableOptions);

        $this->insert('modules', [
            'module' => 'boxes',
            'name' => 'Блоки сайта',
            'active' => 1,
            'icon' => 'fa-cube'
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%boxes}}');
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
