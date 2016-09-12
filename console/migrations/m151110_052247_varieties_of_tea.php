<?php

use yii\db\Migration;

class m151110_052247_varieties_of_tea extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%varieties_of_tea}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'image' => $this->text()->notNull(),
            'publish' => $this->integer()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull()
        ], $tableOptions);

        $this->insert('modules', [
            'module' => 'varieties_of_tea',
            'name' => 'Разновидности чая',
            'active' => 1,
            'icon' => 'fa-globe'
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%varieties_of_tea}}');
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
