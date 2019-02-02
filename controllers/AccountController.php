<?php

namespace app\controllers;

use Yii;
use app\models\Service;
use app\models\Quiz;


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


    public function actionQuiz($id)
    {
        $quiz_model = Quiz::find()
                            ->where(['id' => $id])
                            ->one();

        return $this->render('quiz', ['quiz_model' => $quiz_model]);

    }


}
