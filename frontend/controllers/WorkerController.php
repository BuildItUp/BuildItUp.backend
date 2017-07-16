<?php

namespace frontend\controllers;

use Yii;
use common\models\Worker;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WorkerController implements the CRUD actions for Worker model.
 */
class WorkerController extends Controller
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
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'add-budget-log', 'add-cash-flow', 'add-colleagues', 'add-covered-loc', 'add-worker-contacts'],
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
     * Lists all Worker models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Worker::find(),
        ]);
        if(Worker::find('user_id',$id)){
            return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);    
        }
        // return $this->render('index', [
        //     'dataProvider' => $dataProvider,
        // ]);
    }

    /**
     * Displays a single Worker model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel(['user_id'=>$id]);
        if(isset($model)){
        $providerBudgetLog = new \yii\data\ArrayDataProvider([
            'allModels' => $model->budgetLogs,
        ]);
        $providerCashFlow = new \yii\data\ArrayDataProvider([
            'allModels' => $model->cashFlows,
        ]);
        $providerColleagues = new \yii\data\ArrayDataProvider([
            'allModels' => $model->colleagues,
        ]);
        $providerCoveredLoc = new \yii\data\ArrayDataProvider([
            'allModels' => $model->coveredLocs,
        ]);
        $providerWorkerContacts = new \yii\data\ArrayDataProvider([
            'allModels' => $model->workerContacts,
        ]);
        return $this->render('view', [
            'model' => $this->findModel(['user_id'=>$id]),
            'providerBudgetLog' => $providerBudgetLog,
            'providerCashFlow' => $providerCashFlow,
            'providerColleagues' => $providerColleagues,
            'providerCoveredLoc' => $providerCoveredLoc,
            'providerWorkerContacts' => $providerWorkerContacts,
        ]);
    }
    else
    {
        return $this->render('site/error-worker');
    }
    }

    /**
     * Creates a new Worker model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Worker();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Worker model.
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
     * Deletes an existing Worker model.
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
     * Finds the Worker model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Worker the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Worker::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for BudgetLog
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddBudgetLog()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('BudgetLog');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formBudgetLog', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for CashFlow
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddCashFlow()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('CashFlow');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formCashFlow', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for Colleagues
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddColleagues()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Colleagues');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formColleagues', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for CoveredLoc
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddCoveredLoc()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('CoveredLoc');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formCoveredLoc', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for WorkerContacts
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddWorkerContacts()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('WorkerContacts');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formWorkerContacts', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
