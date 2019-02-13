<?php

namespace app\helpers;

use app\models\Page;

// https://freefrontend.com/css-accordions/#vertical-accordions
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
?>

<div class="accordion js-accordion">

<div class="accordion__item js-accordion-item">
  <div class="accordion-header js-accordion-header">Panel 1</div>
<div class="accordion-body js-accordion-body">

    <div class="accordion js-accordion">
      <div class="accordion__item js-accordion-item">
         <div class="accordion-header js-accordion-header">Sub Panel 1</div>

      </div><!-- end of sub accordion item -->
      <div class="accordion__item js-accordion-item">
         <div class="accordion-header js-accordion-header">Sub Panel 2</div>

      </div><!-- end of sub accordion item -->
    </div><!-- end of sub accordion -->
  </div
  </div><!-- end of accordion body -->
</div><!-- end of accordion item -->

</div><!-- end of accordion -->
