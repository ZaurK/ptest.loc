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

        $service = new Service();
        $my_order = $service->getMyOrders();

        return $this->render('index', ['user_name' => $user_name, 'orders' => $my_order] );
    }


    public function actionQuiz($id)
    {
        $quiz_model = Quiz::find()
                            ->where(['id' => $id])
                            ->one();

        $quiz_title = $quiz_model['quiztitle'];
        $quiz_data = $quiz_model['quiz_data'];
        $id_user = Yii::$app->user->identity->id;
        $id_quiz = $quiz_model['id'];

        return $this->render('quiz', ['quiz_data' => $quiz_data, 'quiz_title' => $quiz_title, 'id_quiz' => $id_quiz, 'id_user' => $id_user]);

    }



    public function actionTest(){

        if (Yii::$app->request->isAjax) {
        $data = Yii::$app->request->post();
        $result = explode(":", $data['result']);
        $id_quiz = explode(":", $data['id_quiz']);
        $id_user = explode(":", $data['id_user']);
        $result = $result[0];
        $id_quiz = $id_quiz[0];
        $id_user = $id_user[0];
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $service = new Service();
        $service->saveResult($result, $id_quiz, $id_user);
         return [
            'result' => $result,
            'id_quiz' => $id_quiz,
            'id_user' => $id_user,
            ];
        }

    }





}
