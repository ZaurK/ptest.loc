<?php

use yii\db\Migration;

/**
 * Handles adding fio to table `user`.
 */
class m190126_064323_add_fio_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'fio', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'fio');
    }
}
