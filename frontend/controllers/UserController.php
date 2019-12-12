<?php

namespace frontend\controllers;

use Yii;

use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\rest\Controller;
use common\models\LoginForm;
use common\models\User;
use yii\helpers\Json;;

//User Management using via REST API
class UserController extends Controller{

    public $modelClass = 'common\models\User';

    //user login using REST. This accepts POST login data
    public function actionLogin(){

        if( !Yii::$app->user->isGuest )
            // return  "Already Logged In";
            return ['message' => "Already Logged In" ];

        $model = new LoginForm(); 

        $model ->username = Yii::$app->request->post("username");
        $model ->password = Yii::$app->request->post("password");
                    
        if ( $model->login()) {
            return User::findOne(Yii::$app->user->id);
        } else {
            $model->password = '';
            return  [ 'message' =>"Login failed !. Invalid credentials"];
        }
    }

    public function actionLogout(){
        return [ "loggedOut" => Yii::$app->user->logout() ];
    }

    protected function verbs()
    {
        return [
            'login' => ['POST', 'HEAD'],
            'logout' => ['POST', 'HEAD'],
            'view' => ['GET', 'HEAD'],
            'create' => ['POST'],
            'update' => ['PUT', 'PATCH'],
            'delete' => ['DELETE'],
        ];
    }
}

