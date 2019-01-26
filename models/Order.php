<?php

namespace app\models;

use Yii;
use app\models\User;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $ordertitle
 * @property string $order_quiz
 * @property string $order_data
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ordertitle', 'order_quiz', 'order_data'], 'required'],
            [['ordertitle', 'order_quiz'], 'string', 'max' => 255],
            [['ordertitle'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ordertitle' => 'Ordertitle',
            'order_quiz' => 'Order Quiz',
            'order_data' => 'Order Data',
        ];
    }

    public function getUserDropdown()
    {
        $listUser  = User::find()->select('id, fio')->where(['role' => '10'])->all();
        $list = ArrayHelper::map( $listUser,'id','fio');

        return $list;
    }
}
