<?php

namespace common\models;

use Yii;
use common\models\Column;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "blog".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $column_id
 * @property integer $review
 * @property string $created_at
 * @property string $updated_at
 */
class Blog extends \yii\db\ActiveRecord
{
    public $column_name;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title','content','column_id'], 'required'],
            [['content'], 'string'],
            [['column_id', 'review'], 'integer'],
            [['created_at', 'updated_at','image','image2'], 'safe'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'content' => '内容',
            'column_id' => '分类',
            'review' => '审核',
            'created_at' => '添加时间',
            'updated_at' => '修改时间',
        ];
    }

    //自动添加时间
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }

    //获取所有分类
    public function getAllColumns()
    {
        return Column::find()->select(['name','id'])->indexBy('id')->asArray()->column();
    }

    //关联分类表
    public function getColumn()
    {
        return $this->hasOne(Column::className(),['id'=>'column_id']);
    }

}
