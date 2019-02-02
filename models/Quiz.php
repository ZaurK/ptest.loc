<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quiz".
 *
 * @property int $id
 * @property string $quiztitle
 * @property string $quiz_data
 */
class Quiz extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quiz';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quiztitle', 'quiz_data'], 'required'],
            [['quiztitle', 'quiz_data'], 'string'],
            [['quiztitle'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'quiztitle' => 'Quiztitle',
            'quiz_data' => 'Quiz Data',
        ];
    }
}
