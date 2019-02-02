<?php

use yii\db\Migration;

/**
 * Handles the creation of table `result`.
 */
class m190131_170114_create_result_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('result', [
            'id' => $this->primaryKey(),
            'id_user' => $this->smallInteger()->notNull(),
            'id_quiz' => $this->smallInteger()->notNull(),
            'result' => $this->text()->notNull(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('result');
    }
}
