<?php

use yii\db\Migration;

/**
 * Class m230306_120258_tag_init
 */
class m230306_120258_tag_init extends Migration
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

        $this->createTable('{{%tag}}', [
            'id' => $this->primaryKey(),
            'slug' => $this->string(256)->notNull()->unique(),
            'title' => $this->string(256)->notNull(),
        ], $tableOptions);

        $this->createTable('{{%tag_to_news}}', [
            'tag_id' => $this->integer(),
            'news_id' => $this->integer(),
        ], $tableOptions);

        $this->addPrimaryKey('pk_tag_to_news', '{{%tag_to_news}}', ['tag_id', 'news_id']);

        $this->addForeignKey('fk_tag_to_news_tag', '{{%tag_to_news}}', 'tag_id', '{{%tag}}','id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_tag_to_news_news', '{{%tag_to_news}}', 'news_id', '{{%news}}','id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_tag_to_news_tag', '{{%tag_to_news}}');

        $this->dropForeignKey('fk_tag_to_news_news', '{{%tag_to_news}}');

        $this->dropPrimaryKey('pk_tag_to_news', '{{%tag_to_news}}');

        $this->dropTable('{{%tag_to_news}}');

        $this->dropTable('{{%tag}}');
    }

}
