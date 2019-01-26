<?php

namespace app\controllers;

use Yii;


class AccountController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $user_name  = Yii::$app->user->identity->username;
        $sess = Yii::$app->user;
        return $this->render('index', ['user_name' => $user_name, 'sess' => $sess] );
    }

}
