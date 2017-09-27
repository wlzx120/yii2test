<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `column`.
 */
class m170926_085230_create_column_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('column', [
            'id' => Schema::TYPE_PK." comment 'blog分类表id' ",
            'name' => Schema::TYPE_STRING." comment '分类名称' ",
            'created_at' => Schema::TYPE_INTEGER." comment '添加时间' ",
            'updated_at' => Schema::TYPE_INTEGER." comment '修改时间' "
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('column');
    }
}
