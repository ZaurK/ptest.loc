<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Order;
use app\models\Quiz;
use yii\helpers\Url;
use app\models\Result;

/**
 * This is the model class for Studying Process.
 *
 */
class Service extends \yii\db\ActiveRecord
{
    /**
    * Return a quiz title by order_quiz.
    *
    */
    public function getQuizTitlesById($order_quiz)
    {
        $my_quiz = Quiz::find()
                         -> where(['id' => $order_quiz])
                         -> one();
        return $my_quiz['quiztitle'];
    }

    /**
    * Return a quiz titles array.
    *
    */
    public function getMyOrders()
    {
        $my_orders = Order::find()->all();
        $order = array();
        //$titles_id = array();
        $my_quiz_titles = array();

        foreach($my_orders as $ordr){
            $order = unserialize($ordr['order_data']);
            foreach ($order as $key){
                if(Yii::$app->user->identity->id == $key){
                  if($this->checkQuiz($ordr['order_quiz']) == True){
                    $my_quiz_titles[] = $this->getQuizTitlesById($ordr['order_quiz']);

                      }else{
                        $my_quiz_titles[] = $this->getQuizTitlesById($ordr['order_quiz'])
                                           .'<a href="'. Url::toRoute(['account/quiz', 'id' => $ordr['id']])
                                           .'">    Начать тестирование</a>';
                      }

                }
            }
        }

        return $my_quiz_titles;
    }

    /**
    * Check if quiz was finiched.
    *
    */
    public function checkQuiz($id_quiz)
    {
      $id_user = Yii::$app->user->identity->id;
      $res = Result::find()->where(['id_user'=>$id_user, 'id_quiz'=>$id_quiz])->one();
      if($res){
        return True;
      }


    }


    /**
    * Save results in db
    *
    */
    public function saveResult($result, $id_quiz, $id_user)
    {
        $res = new Result();
        $res->result = $result;
        $res->id_quiz = $id_quiz;
        $res->id_user = $id_user;
        $res->save();

    }



}
