<?php

use yii\db\Migration;

class m151103_101732_geography extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%geography}}', [
            'id' => $this->primaryKey(),
            'country' => $this->text()->notNull(),
            'city' => $this->text()->notNull(),
            'address' => $this->text()->notNull(),
            'mode' => $this->text()->notNull(),
            'shop_name' => $this->text()->notNull(),
            'fio' => $this->text()->notNull(),
            'phone' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull()
        ], $tableOptions);

        $this->createTable('{{%geography_images}}', [
            'id' => $this->primaryKey(),
            'geography_id' => $this->integer()->notNull(),
            'basename' => $this->string()->notNull(),
            'ext' => $this->string()->notNull(),
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
        $this->dropTable('{{%geography_images}}');
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
