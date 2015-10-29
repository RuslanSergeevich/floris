<?php

use yii\db\Migration;

class m151029_090110_geography extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%geography}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'address' => $this->text()->notNull(),
            'image' => $this->text()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull()
        ], $tableOptions);

        $this->insert('modules', [
            'module' => 'geography',
            'name' => 'География продаж',
            'active' => 1,
            'icon' => 'fa-globe'
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%geography}}');
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
