<?php

use yii\db\Migration;

class m151019_085637_catalog_items extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%catalog_items}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer()->notNull(),
            'gallery_cat_id' => $this->integer()->notNull(),
            'alias' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'text' => $this->text()->notNull(),
            'title' => $this->text()->notNull(),
            'description' => $this->text()->notNull(),
            'keywords' => $this->text()->notNull(),
            'publish' => $this->integer(1)->defaultValue(1),
            'pos' => $this->integer()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull()
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%catalog_items}}');
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
