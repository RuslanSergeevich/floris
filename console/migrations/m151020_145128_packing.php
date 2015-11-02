<?php

use yii\db\Migration;

class m151020_145128_packing extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%packing}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'declination' => $this->string()->notNull(),
            'publish' => $this->integer(1)->defaultValue(1),
            'pos' => $this->integer()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull()
        ], $tableOptions);

        $this->insert('modules', [
            'module' => 'packing',
            'name' => 'Упаковки',
            'active' => 1,
            'icon' => 'fa-th-large'
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%packing}}');
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
