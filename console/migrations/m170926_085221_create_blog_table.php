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
            'review' => Schema::TYPE_BOOLEAN." default false comment '审核' ",
            'created_at' => Schema::TYPE_INTEGER." comment '发布时间' ",
            'updated_at' => Schema::TYPE_INTEGER." comment '修改时间' ",
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
