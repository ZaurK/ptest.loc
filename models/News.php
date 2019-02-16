<?php

namespace app\models;

use Yii;
use yii\helpers\StringHelper;
use yii\helpers\Url;

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

   /**
    * {@inheritdoc}
    */
    public static function getNews()
    {
      // $news = new News();
      $rows = News::find()
                       ->orderBy(['created_at'=> SORT_DESC])
                       ->limit(3)
                       ->all();

      foreach ($rows as $row){
         $content = StringHelper::truncateWords($row['new_content'], 50, '...');
         echo '<div class="col-md-12"><h2><a href="'.Url::toRoute(["site/new", "id" => $row["id"]]).'">'.$row["new_title"].'</a></h2><p>'.$row["created_at"].'</p><p>'.$content.'</p><br></div>';
         echo '<div class="col-md-12"><p><a class="btn btn-default" href="'.Url::toRoute(["site/new", "id" => $row["id"]]).'">Далее &raquo;</a></p><br></div>';
      }
    }




}
