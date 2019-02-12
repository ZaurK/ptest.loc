<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "page".
 *
 * @property int $id
 * @property int $id_parent
 * @property string $page_title
 * @property string $page_content
 * @property int $page_num
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_parent', 'page_num'], 'integer'],
            [['page_title'], 'required'],
            [['page_content'], 'string'],
            [['page_title'], 'string', 'max' => 255],
            [['page_title'], 'unique'],
            [['id_parent'], 'exist', 'skipOnError' => true, 'targetClass' => Page::className(), 'targetAttribute' => ['id_parent' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_parent' => 'Родитель',
            'page_title' => 'Заголовок',
            'page_content' => 'Контент',
            'page_num' => 'Порядок',
        ];
    }


    /**
    * @return \yii\db\ActiveQuery
    */
    public function getPage()
    {
        return $this->hasOne(Page::className(), ['id' => 'id_parent']);
    }
}
