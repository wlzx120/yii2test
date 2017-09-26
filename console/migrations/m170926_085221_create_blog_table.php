<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `blog`.
 */
class m170926_085221_create_blog_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('blog', [
            'id' => Schema::TYPE_PK." comment 'blog表id' ",
            'title' => Schema::TYPE_STRING." comment 'blog标题' ",
            'content' => Schema::TYPE_TEXT." comment 'blog内容' ",
            'column_id' => Schema::TYPE_INTEGER." comment '分类id' ",
            'create_at' => Schema::TYPE_STRING." comment '发布时间' ",
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('blog');
    }
}
