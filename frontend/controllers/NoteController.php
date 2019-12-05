<?php

namespace frontend\controllers;

use Yii;
use app\models\Note;
use app\models\NoteSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Category;

/**
 * NoteController implements the CRUD actions for Note model.\
 * 
 */


//Normal Controller
// class NoteController extends Controller
// {
//     /**
//      * {@inheritdoc}
//      */
//     public function behaviors()
//     {
//         return [
//             'verbs' => [
//                 'class' => VerbFilter::className(),
//                 'actions' => [
//                     'delete' => ['POST'],
//                 ],
//             ],
//         ];
//     }

//     /**
//      * Lists all Note models.
//      * @return mixed
//      */
//     public function actionIndex()
//     {
//         if (Yii::$app->user->isGuest) {
//             return $this->goHome();
//         }
//         $searchModel = new NoteSearch();
//         $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
//         return $this->render('index', [
//             'searchModel' => $searchModel,
//             'dataProvider' => $dataProvider,
//         ]);
//     }

//     /**
//      * Displays a single Note model.
//      * @param integer $id
//      * @return mixed
//      * @throws NotFoundHttpException if the model cannot be found
//      */
//     public function actionView($id)
//     {
//         $note = $this-> findModel($id);
//         $category = Category::findOne($note->categoryId);
//         return $this->render('view', [
//             'model' => $note,
//             'categoryName' => $category->categoryName
//         ]);
//     }

//     /**
//      * Creates a new Note model.
//      * If creation is successful, the browser will be redirected to the 'view' page.
//      * @return mixed
//      */
//     public function actionCreate()
//     {
//         $model = new Note();
//         $model->userId = Yii::$app->user->identity->id;
//         if ($model->load(Yii::$app->request->post()) && $model->save()) {
//             return $this->redirect(['view', 'id' => $model->noteId]);
//         }
    
//         return $this->render('create', [
//             'model' => $model,
//         ]);
//     }

//     /**
//      * Updates an existing Note model.
//      * If update is successful, the browser will be redirected to the 'view' page.
//      * @param integer $id
//      * @return mixed
//      * @throws NotFoundHttpException if the model cannot be found
//      */
//     public function actionUpdate($id)
//     {
//         $model = $this->findModel($id);

//         if ($model->load(Yii::$app->request->post()) && $model->save()) {
//             return $this->redirect(['view', 'id' => $model->noteId]);
//         }

//         return $this->render('update', [
//             'model' => $model,
//         ]);
//     }

//     /**
//      * Deletes an existing Note model.
//      * If deletion is successful, the browser will be redirected to the 'index' page.
//      * @param integer $id
//      * @return mixed
//      * @throws NotFoundHttpException if the model cannot be found
//      */
//     public function actionDelete($id)
//     {
//         $this->findModel($id)->delete();
//         return $this->redirect(['index']);
//     }

//     /**
//      * Finds the Note model based on its primary key value.
//      * If the model is not found, a 404 HTTP exception will be thrown.
//      * @param integer $id
//      * @return Note the loaded model
//      * @throws NotFoundHttpException if the model cannot be found
//      */
//     protected function findModel($id)
//     {
//         if (($model = Note::findOne($id)) !== null) {
//             return $model;
//         }

//         throw new NotFoundHttpException('The requested page does not exist.');
//     }
// }

///////////////////////////////////////////////////////////////////////////////////////////


// use yii\helpers\Json;
// use yii\web\Response;

// //Rest API Controller for Notes
// class NoteController extends Controller
// {
//     public $modelClass = 'app\models\Note';

//     public function actionIndex(){

//      if (Yii::$app->user->isGuest) {
//             return $this->goHome();
//         }
//         $searchModel = new NoteSearch();
//         $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
//         // return $this->render('index', [
//         //     'searchModel' => $searchModel,
//         //     'dataProvider' => $dataProvider,
//         // ]);

//         return Json::encode($dataProvider->getModels());
//         // Yii::$app->response( $dataProvider->getModels() );
//     }
// }


use frontend\controllers\MyActiveController;
use yii\data\ActiveDataProvider;


//Rest API Controller for Notes
class NoteController extends MyActiveController
{
    // public $modelClass = 'app\models\Note';
    public $modelClass = 'frontend\resources\NoteWithCategory';

    public function actions() {
        $actions = parent::actions();

        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider']; 
        return $actions;
    }

    public function actionUserNotes( $id ) {
        if ( $id == Yii::$app->user->identity->id )
            return Json::encode(['success'=>true, 'data'=>$id]);
        else
            return Json::encode(['failed', 'message' => "Couldn't find the user" ]);
    }

    public function prepareDataProvider(){
        return new ActiveDataProvider([
            'query' => $this->modelClass::find()-> andWhere(['categoryId' => \Yii::$app->request->get('categoryId')])
        ]);
    }

}