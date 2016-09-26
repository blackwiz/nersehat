<?php

namespace frontend\controllers;

use Yii;
use frontend\models\AnggotaKeluarga;
use frontend\models\AnggotaKeluargaSearch;
use frontend\models\Keluarga;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * AnggotaKeluargaController implements the CRUD actions for AnggotaKeluarga model.
 */
class AnggotaKeluargaController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all AnggotaKeluarga models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AnggotaKeluargaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AnggotaKeluarga model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AnggotaKeluarga model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $uid = Yii::$app->user->identity->id;
        $model = new AnggotaKeluarga();
        $keluarga = ArrayHelper::map(
            Keluarga::find()
                ->select(['keluarga.kid', 'keluarga.nama_keluarga'])
                ->leftJoin('user_keluarga', 'user_keluarga.kid = keluarga.kid')
                ->where([
                        'user_keluarga.user_id' => $uid,
                    ])
                ->all(), 'kid', 'nama_keluarga'
        );

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->aid]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'keluarga' => $keluarga,
            ]);
        }
    }

    /**
     * Updates an existing AnggotaKeluarga model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $uid = Yii::$app->user->identity->id;
        $model = $this->findModel($id);
        $keluarga = ArrayHelper::map(
            Keluarga::find()
                ->select(['keluarga.kid', 'keluarga.nama_keluarga'])
                ->leftJoin('user_keluarga', 'user_keluarga.kid = keluarga.kid')
                ->where([
                        'user_keluarga.user_id' => $uid,
                    ])
                ->all(), 'kid', 'nama_keluarga'
        );
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->aid]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'keluarga' => $keluarga,
            ]);
        }
    }

    /**
     * Deletes an existing AnggotaKeluarga model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AnggotaKeluarga model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AnggotaKeluarga the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AnggotaKeluarga::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
