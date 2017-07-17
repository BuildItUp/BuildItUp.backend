<?php

namespace frontend\controllers;

use Yii;
use common\models\Worker;
use common\models\BudgetLog;
use common\models\BudgetLogSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Security;
/**
 * BudgetLogController implements the CRUD actions for BudgetLog model.
 */
class BudgetLogController extends Controller
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
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete','project'],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => false
                    ]
                ]
            ]
        ];
    }

    /**
     * Lists all BudgetLog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BudgetLogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BudgetLog model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new BudgetLog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BudgetLog();
        $worker = Worker::findOne(['user_id' => Yii::$app->user->identity->id]);
        if ($model->loadAll(Yii::$app->request->post()) ) {
            $model->action = 'Withdraw';
            $model->worker_id = $worker->id;
              $model->token = Yii::$app->getSecurity()->generateRandomString(5);
            if($model->amount <= $worker->personal_budget){
                if($model->save()){
                     return $this->redirect(['view', 'id' => $model->id]);
                     }
                 else
                 {
                     return 'wow';
                     }
            }
           else {
             Yii::$app->getSession()->setFlash('error', 'Amount Exceed Budget Balance');
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionProject()
    {
        $model = new BudgetLog();
        $worker = Worker::findOne(['user_id' => Yii::$app->user->identity->id]);
        if ($model->loadAll(Yii::$app->request->post()) ) {
            $model->action = 'Withdraw Project';
            $model->worker_id = $worker->id;
              $model->token = Yii::$app->getSecurity()->generateRandomString(5);
            if($model->amount <= $worker->project_budget){
                if($model->save()){
                     return $this->redirect(['view', 'id' => $model->id]);
                     }
                 else
                 {
                     return 'wow';
                     }
            }
           else {
             Yii::$app->getSession()->setFlash('error', 'Amount Exceed Budget Balance');
            return $this->render('project', [
                'model' => $model,
            ]);
        }
        } else {
            return $this->render('project', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Updates an existing BudgetLog model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing BudgetLog model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }

    
    /**
     * Finds the BudgetLog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BudgetLog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BudgetLog::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
