<?php
use yii\widgets\LinkPager;
use yii\helpers\StringHelper;
use yii\helpers\Url;

$this->title = 'My News';
?>

<div class="site-index">
    <div class="body-content">
      <?php
          foreach ($models as $model) {
          // display $model here
          $content = StringHelper::truncateWords($model['new_content'], 50, '...');
          echo '<div class="col-md-12"><h2><a href="'.Url::toRoute(["site/new", "id" => $model["id"]]).'">'.$model["new_title"].'</a></h2><p>'.$model["created_at"].'</p><p>'.$content.'</p><br></div>'
          .'<div class="col-md-12"><p><a class="btn btn-default" href="">Далее &raquo;</a></p><br></div>';
          }
          ?>
    </div>
</div>

<?php
// display pagination
echo LinkPager::widget([
    'pagination' => $pages,
]);
