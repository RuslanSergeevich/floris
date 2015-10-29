<?php

use yii\db\Migration;

class m151029_065915_workers extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%workers}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'appointment' => $this->string()->notNull(),
            'image' => $this->text()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull()
        ], $tableOptions);

        $this->insert('modules', [
            'module' => 'workers',
            'name' => 'Сотрудники',
            'active' => 1,
            'icon' => 'fa-users'
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%workers}}');
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
