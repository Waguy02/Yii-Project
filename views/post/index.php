


<div  class="row well" style="background: #292e36">
<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>




<div  id="postListDiv" class="col-lg-<?php if(!Yii::$app->user->isGuest)echo('7');else{echo('10');} ?> ">

        <?= $this->render('postList',['posts'=>$posts,'pagination'=>$pagination,'commentForm'=>$commentForm]) ?>

</div>




<div class="col-lg-1">
</div>

<div class="col-lg-4">

<script>

    $('input[name=myPosts]').change(function() {
                     if($(this).is(':checked')) {
                            alert('OKCK');
                     }

    });
 
       
       
      
    </script>
    <h3 >Recherche </h3>
    <?php

if(! Yii::$app->user->isGuest)  echo($this->render('postSearch',['model'=>$model]) )?>

            

</div>
</div>






