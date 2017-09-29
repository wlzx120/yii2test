<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

class m170929_033813_add_image_to_blog extends Migration
{
    public function up()
    {
        $this->addColumn('blog','image',Schema::TYPE_STRING." comment 'blog图片' ");
    }

    public function down()
    {
        $this->dropColumn('blog','image');
    }

}
