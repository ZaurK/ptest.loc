<?php

namespace app\helpers;

use app\models\Page;

class getLeftMenu
{
    public static function getLinks()
    {
      $rows = Page::find()
                       ->where (['id_parent' => NULL])
                       ->all();

      foreach ($rows as $row){
        echo "<li>"
        .$row['page_title']
        . "</li>";
      }
    }


}
