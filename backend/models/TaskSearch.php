<?php

namespace backend\models;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Task;
/**
 * TaskSearch represents the model behind the search form of `common\models\Task`.
 */
class TaskSearch extends Task
{
    public $authorEmail;
    public $projectName;
    public $workerEmail;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'project_id', 'author_id', 'worker_id', 'status_id', 'priority_id', 'created_at', 'updated_at'], 'integer'],
            [['deadLine_date', 'start_date', 'end_date'], 'date', 'format' => 'php:d.M.Y'],
            [['created_at', 'updated_at'], 'date', 'format' => 'php:d.M.Y'],
            [['title', 'description'], 'safe'],
            [['authorEmail', 'projectName', 'workerEmail'], 'string'],
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
        $query = Task::find()->joinWith($this->author);
        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 7,
            ],
        ]);
        $this->load($params);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        if (!empty($this->deadLine_date)) {
            $dayStart = \Yii::$app->formatter->asTimestamp($this->deadLine_date . ' 00:00:00');
            $dayStop = \Yii::$app->formatter->asTimestamp($this->deadLine_date . ' 23:59:59');
            $query->andFilterWhere([
                'between',
                self::tableName() . '.deadLine_date',
                $dayStart,
                $dayStop,
            ]);
        }
        if (!empty($this->start_date)) {
            $dayStart = \Yii::$app->formatter->asTimestamp($this->start_date . ' 00:00:00');
            $dayStop = \Yii::$app->formatter->asTimestamp($this->start_date . ' 23:59:59');
            $query->andFilterWhere([
                'between',
                self::tableName() . '.start_date',
                $dayStart,
                $dayStop,
            ]);
        }
        if (!empty($this->end_date)) {
            $dayStart = \Yii::$app->formatter->asTimestamp($this->end_date . ' 00:00:00');
            $dayStop = \Yii::$app->formatter->asTimestamp($this->end_date . ' 23:59:59');
            $query->andFilterWhere([
                'between',
                self::tableName() . '.end_date',
                $dayStart,
                $dayStop,
            ]);
        }
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'project_id' => $this->project_id,
            'author_id' => $this->author_id,
            'worker_id' => $this->worker_id,
            'deadLine_date' => $this->deadLine_date,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status_id' => $this->status_id,
            'priority_id' => $this->priority_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);
        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'user.username', $this->authorEmail])
            ->andFilterWhere(['like', 'user.username', $this->workerEmail])
            ->andFilterWhere(['like', 'project.title', $this->projectName]);
        return $dataProvider;
    }
}
