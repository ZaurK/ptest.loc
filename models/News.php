<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $new_title
 * @property string $new_content
 * @property string $created_at
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['new_title', 'new_content', 'created_at'], 'required'],
            [['new_content'], 'string'],
            [['new_title', 'created_at'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'new_title' => 'New Title',
            'new_content' => 'New Content',
            'created_at' => 'Created At',
        ];
    }
}
