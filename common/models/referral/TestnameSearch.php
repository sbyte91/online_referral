<?php

namespace common\models\referral;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\referral\Testname;

/**
 * TestnameSearch represents the model behind the search form about `common\models\referraladmin\Testname`.
 */
class TestnameSearch extends Testname
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['testname_id'], 'integer'],
            [['test_name', 'active', 'create_time', 'update_time'], 'safe'],
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
        $query = Testname::find();

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
            'testname_id' => $this->testname_id,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
        ]);

        $query->andFilterWhere(['like', 'test_name', $this->test_name])
            ->andFilterWhere(['like', 'active', $this->active]);

        return $dataProvider;
    }
}
