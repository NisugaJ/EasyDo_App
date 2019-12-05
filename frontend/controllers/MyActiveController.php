<?php

namespace frontend\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\filters\auth\HttpBearerAuth;
use yii\helpers\Json;

use yii\web\ForbiddenHttpException;


class MyActiveController extends ActiveController
{
    public function behaviors(){
        $behaviors = parent::behaviors();

        $behaviors['authenticator']['authMethods'] = [
             HttpBearerAuth::className()
        ];

        return $behaviors;
    }

    public function checkAccess($action, $model = null, $params = [])
    {
        if(in_array($action, ['view','update', 'delete']) && $model->userId !== Yii::$app->user->identity->id  )
            throw new ForbiddenHttpException("You donot have permission to change this record");
    }
}
