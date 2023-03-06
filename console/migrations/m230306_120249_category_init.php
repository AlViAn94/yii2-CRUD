<?php

use yii\db\Migration;

/**
 * Class m230306_120249_category_init
 */
class m230306_120249_category_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'slug' => $this->string(256)->notNull()->unique(),
            'title' => $this->string(256)->notNull(),

            'enabled' => $this->boolean()->notNull()->defaultValue(0), // 0 or 1
        ], $tableOptions);

        $this->addForeignKey('fk_category_to_news', '{{%news}}', 'category_id', '{{%category}}', 'id',
            'SET NULL', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_category_to_news', '{{%news}}');

        $this->dropTable('{{%category}}');
    }

}
