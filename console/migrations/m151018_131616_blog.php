<?php

use yii\db\Migration;

class m151018_131616_blog extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%blog}}', [
            'id' => $this->primaryKey(),
            'alias' => $this->string()->notNull(),
            'image' => $this->text()->notNull(),
            'name' => $this->string()->notNull(),
            'text' => $this->text()->notNull(),
            'title' => $this->text()->notNull(),
            'description' => $this->text()->notNull(),
            'keywords' => $this->text()->notNull(),
            'publish' => $this->integer(1)->defaultValue(1),
            'show_main' => $this->integer(1)->defaultValue(1),
            'pos' => $this->integer()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull()
        ], $tableOptions);

        $this->insert('modules', [
            'module' => 'blog',
            'name' => 'Блог',
            'active' => 1,
            'icon' => 'fa-newspaper-o'
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%news}}');
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
