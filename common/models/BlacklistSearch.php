<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Blacklist;

/**
 * BlacklistSearch represents the model behind the search form about `common\models\Blacklist`.
 */
class BlacklistSearch extends Blacklist
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'appid', 'created_at', 'updated_at'], 'integer'],
            [['content'], 'safe'],
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
        $uid = Yii::$app->user->id;
        if( ! Yii::$app->user->can('administrator') ){
            $query = Blacklist::find()->leftJoin("project","blacklist.appid = project.appid")->where("project.belong_uid = $uid");      
        }else {
            $query = Blacklist::find();
        }
        //var_dump($query->createCommand()->getSql());exit;

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

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'appid' => $this->appid,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
