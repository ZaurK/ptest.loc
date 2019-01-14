<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order`.
 */
class m190113_164356_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('order', [
            'id' => $this->primaryKey(),
            'ordertitle' => $this->string()->notNull()->unique(),
            'order_quiz' => $this->string()->notNull(),
            'order_data' => $this->text()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('order');
    }
}
