<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Blog;

/**
 * BlogSearch represents the model behind the search form about `common\models\Blog`.
 */
class BlogSearch extends Blog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'column_id', 'review'], 'integer'],
            [['title', 'content', 'created_at', 'updated_at','column_name'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Blog::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        //联表查询
        $query->joinWith('column')->select(['blog.*','column.name']);

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'review' => $this->review,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        //查询条件
        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'column.name', $this->column_name]);

        //联表查询添加排序
        $dataProvider->sort->attributes['column_name'] =
            [
                'asc' => ['column_id' => SORT_ASC ],
                'desc' => ['column_id' => SORT_DESC]
            ];
        return $dataProvider;
    }
}
