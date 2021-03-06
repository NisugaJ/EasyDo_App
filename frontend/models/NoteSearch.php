<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Note;
use yii\db\Query;
use Yii;

/**
 * NoteSearch represents the model behind the search form of `app\models\Note`.
 */
class NoteSearch extends Note
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['noteId'], 'integer'],
            [['title', 'categoryId','description', 'addedDateTime', 'reminderDate', 'reminderTime', 'expiryDateTime'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = (new Query())-> from('note') ->where(['note.userId' => Yii::$app->user->identity->id]);
        // add conditions that should always apply here
        $query->join('INNER JOIN','category c', 'c.categoryId= note.categoryId');

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
            'noteId' => $this->noteId,
            'categoryId' => $this->categoryId,
            'addedDateTime' => $this->addedDateTime,
            'reminderDate' => $this->reminderDate,
            'reminderTime' => $this->reminderTime,
            'expiryDateTime' => $this->expiryDateTime,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
