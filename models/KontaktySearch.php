<?php

namespace app\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kontakty;

/**
 * KontaktySearch represents the model behind the search form of `app\models\Kontakty`.
 */
class KontaktySearch extends Kontakty
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'telefon'], 'integer'],
            [['imie', 'nazwisko', 'adres', 'email', 'wlasciciel'], 'safe'],
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

        if(Yii::$app->user->identity->admin !== 1) {
            $query = Kontakty::find()->where(['wlasciciel' => Yii::$app->user->identity->username]);
        }
        else if (Yii::$app->user->identity->admin === 1)
        {
            $query = Kontakty::find();
        }


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['nazwisko'=>SORT_ASC]]
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
            'telefon' => $this->telefon,
        ]);

        $query->andFilterWhere(['like', 'imie', $this->imie])
            ->andFilterWhere(['like', 'nazwisko', $this->nazwisko])
            ->andFilterWhere(['like', 'adres', $this->adres])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'wlasciciel', $this->wlasciciel]);

        return $dataProvider;
    }
}
