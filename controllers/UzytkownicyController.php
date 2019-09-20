<?php

namespace app\controllers;

use Yii;
use app\models\Uzytkownicy;
use app\models\UzytkownicySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UzytkownicyController implements the CRUD actions for Uzytkownicy model.
 */
class UzytkownicyController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Uzytkownicy models.
     * @return mixed
     */
    public function actionIndex()
    {

        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }
        $searchModel = new UzytkownicySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Uzytkownicy model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Uzytkownicy model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }
        $model = new Uzytkownicy();

        $model -> authKey = Yii::$app->security->generateRandomString();

        if ($model->load(Yii::$app->request->post()))
        {
            $hash = Yii::$app->getSecurity()->generatePasswordHash($model -> password);
            $model -> password = $hash;
        }

        if ($model->save()){
            return $this->redirect(['view', 'id' => $model->id]);
        }





        //if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //    return $this->redirect(['view', 'id' => $model->id]);
       // }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }
        $model = $this->findModel($id);



        if ($model->load(Yii::$app->request->post())) {
            $hash = Yii::$app->getSecurity()->generatePasswordHash($model -> password);
            $model -> password = $hash;
        }


        if ($model->save()) {

        }


        //if ($model->load(Yii::$app->request->post()) && $model->save()) {
         //   return $this->redirect(['view', 'id' => $model->id]);
      //  }


        return $this->render('update', [
            'model' => $model,
        ]);

    }

    /**
     * Deletes an existing Uzytkownicy model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Uzytkownicy model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Uzytkownicy the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }
        if (($model = Uzytkownicy::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
