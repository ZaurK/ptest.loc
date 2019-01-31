<?php

namespace app\controllers;

use Yii;
use app\models\Service;


class AccountController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if (Yii::$app->user->identity->username){
                 $user_name  = Yii::$app->user->identity->username;
             }else{
                 $this->redirect(['site/login']);
             }
        $sess = Yii::$app->user;

        $service = new Service();
        $my_order = $service->getMyOrders();

        return $this->render('index', ['user_name' => $user_name, 'orders' => $my_order, 'sess' => $sess] );
    }


    public function actionQuiz()
    {
        return $this->render('quiz');

    }


}
