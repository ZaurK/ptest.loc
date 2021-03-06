<?php

namespace app\models;

use Yii;
use app\models\Quiz;

/**
 * This is the model class for table "result".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_quiz
 * @property string $result
 */
class Result extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'result';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_quiz', 'result'], 'required'],
            [['id_user', 'id_quiz'], 'integer'],
            [['result'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'id_quiz' => 'Id Quiz',
            'result' => 'Result',
        ];
    }


    public function getQuizBond()
    {
        return $this->hasOne(Quiz::class,['id' => 'id_quiz']);
    }

    public function getUserBond()
    {
        return $this->hasOne(User::class,['id' => 'id_user']);
    }
}
