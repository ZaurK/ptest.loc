<?php

$this->title = 'My News';
?>

<div class="site-index">
    <div class="body-content">
      <?php
          echo '<div class="col-md-12"><h2>'.$model_new->new_title.'</h2><p>'.$model_new->created_at.'</p><p>'
          .$model_new->new_content.'</p><br></div>';
          ?>
    </div>
</div>
