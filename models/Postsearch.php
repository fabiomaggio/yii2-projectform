<?php

namespace infoweb\projectform\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use infoweb\projectform\models\Projectform;

/**
 * Postsearch represents the model behind the search form about `infoweb\projectform\models\Projectform`.
 */
class Postsearch extends Projectform
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at'], 'integer'],
            [['project_id', 'name', 'settings'], 'safe'],
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
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Projectform::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'project_id', $this->project_id])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'settings', $this->settings]);

        return $dataProvider;
    }
}
