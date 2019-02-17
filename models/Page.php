<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
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
            [['id_parent', 'page_num', 'access'], 'integer'],
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
            'access' => 'Доступ',
        ];
    }


    /**
    * @return \yii\db\ActiveQuery
    */
    public function getParent()
    {
        return $this->hasOne(Page::className(), ['id' => 'id_parent']);
    }

    public function getParentName()
    {
        $parent = $this->parent;
        return $parent ? $parent->page_title : '';
    }

    public static function getParentsList()
    {
    // Выбираем только те категории, у которых есть дочерние категории
    $parents = Page::find()
        ->select(['p.id', 'p.page_title'])
        ->join('JOIN', 'page p', 'page.id_parent = p.id')
        ->distinct(true)
        ->all();

    return ArrayHelper::map($parents, 'id', 'page_title');
    }

  





}
