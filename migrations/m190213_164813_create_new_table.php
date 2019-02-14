<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%new}}`.
 */
class m190213_164813_create_new_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'new_title' => $this->string()->notNull(),
            'new_content' => $this->text()->notNull(),
            'created_at' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }
}
