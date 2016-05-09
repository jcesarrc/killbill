<?php

namespace app\controllers;

use app\models\Academia;
use app\models\Pago;
use app\models\PagoSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * PagoController implements the CRUD actions for Pago model.
 */
class PagoController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Pago models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PagoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pago model.
     * @param integer $id
     * @param integer $academia
     * @return mixed
     */
    public function actionView($id, $academia)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $academia),
        ]);
    }

    /**
     * Finds the Pago model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $academia
     * @return Pago the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $academia)
    {
        if (($model = Pago::findOne(['id' => $id, 'academia' => $academia])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Pago model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($academia = 0)
    {
        if (!isset($academia) || $academia == 0) {

            $model = new Pago();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id, 'academia' => $model->academia]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        } else if ($academia > 0) {

            $model = new Pago();
            $model->academia = $academia;
            $searchModel = new PagoSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $model_detalle_academia = Academia::findOne(['id' => $academia]);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id, 'academia' => $model->academia]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'model_detalle_academia' => $model_detalle_academia,
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
            }

        }
    }

    /**
     * Updates an existing Pago model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $academia
     * @return mixed
     */
    public function actionUpdate($id, $academia)
    {
        $model = $this->findModel($id, $academia);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'academia' => $model->academia]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Pago model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $academia
     * @return mixed
     */
    public function actionDelete($id, $academia)
    {
        $this->findModel($id, $academia)->delete();

        return $this->redirect(['index']);
    }
}
