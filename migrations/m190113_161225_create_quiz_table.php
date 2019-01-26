<?php

use yii\db\Migration;

/**
 * Handles the creation of table `quiz`.
 */
class m190113_161225_create_quiz_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('quiz', [
            'id' => $this->primaryKey(),
            'quiztitle' => $this->string()->notNull()->unique(),
            'quiz_data' => $this->text()->notNull(),


        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('quiz');
    }
}
