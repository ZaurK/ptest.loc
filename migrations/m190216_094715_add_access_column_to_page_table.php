<?php

use yii\db\Migration;

/**
 * Handles adding access to table `{{%page}}`.
 */
class m190216_094715_add_access_column_to_page_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->addColumn('page', 'access', 'smallint AFTER page_content');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
