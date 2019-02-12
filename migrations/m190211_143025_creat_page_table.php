<?php

use yii\db\Migration;

/**
 * Class m190211_143025_creat_page_table
 */
class m190211_143025_creat_page_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('page', [
          'id' => $this->primaryKey(),
          'id_parent' => $this->smallInteger(),
          'page_title' => $this->string()->notNull()->unique(),
          'page_content' => $this->text()->notNull(),
          'page_num' => $this->smallInteger(),

      ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190211_143025_creat_page_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190211_143025_creat_page_table cannot be reverted.\n";

        return false;
    }
    */
}
