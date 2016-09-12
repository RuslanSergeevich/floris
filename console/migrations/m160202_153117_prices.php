<?php

use yii\db\Schema;
use yii\db\Migration;

class m160202_153117_prices extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%prices}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull()
        ], $tableOptions);

        $this->createTable('{{%prices_values}}', [
            'id' => $this->primaryKey(),
            'price_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull(),
            'price_value' => $this->integer()->notNull()
        ], $tableOptions);

        $this->insert('modules', [
            'module' => 'prices',
            'name' => 'Прайсы',
            'icon' => 'fa-rub',
            'active' => 1
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%prices}}');
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
