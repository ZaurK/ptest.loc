<button id="test">Call Ajax</button>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

$('#test').click(function(){

   $.ajax({
       url: '<?php echo Yii::$app->request->baseUrl. '/site/test' ?>',
       type: 'post',
       data: {
                 name: 'zaur' ,
                 sername: 'kalazh' ,
                 _csrf : '<?=Yii::$app->request->getCsrfToken()?>'
             },
       success: function (data) {
          console.log(data);
       }
  });

});




</script>