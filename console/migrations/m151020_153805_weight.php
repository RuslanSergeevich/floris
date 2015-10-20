<?php

use yii\db\Schema;
use yii\db\Migration;

class m151020_153805_weight extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%weight}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'publish' => $this->integer(1)->defaultValue(1),
            'pos' => $this->integer()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull()
        ], $tableOptions);

        $this->insert('modules', [
            'module' => 'weight',
            'name' => 'Масса',
            'active' => 1,
            'icon' => 'fa-balance-scale'
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%weight}}');
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
