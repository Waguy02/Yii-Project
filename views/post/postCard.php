<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<style>
    .customCard{

        border-radius: 1em;

    }

    .customCardTitle{

        background: #292e36;
        color:white;
    }

</style>
<div class="well row" class="customCard" style="background: lightgray">

    
    <div class="col-lg-12">
    <hr>
        <!-- the actual blog post: title/author/date/content -->
        <h1 class='customCardTitle' ><?= $post->title ?> (<?= $post->getUser()->username ?>) ----- </h1> <span class="left"><?php $post->postDate?></span>




        </p>    
        <hr>

        
        <p class="lead"><?= $post->content?>
        <hr>
        <hr>
    
        </p>

     <div class="media-heading">
          <button class="btn btn-default btn-xs" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseExample"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button> <span class="label label-info"> Les commentaires </span>
        </div>

    <div class="well" id="collapseOne" aria-expanded="false">

                    <h4><i class="fa fa-paper-plane-o"  id="collapseOne"></i>Commentaires</h4>
                    <ul class="list-group">

                       <?php foreach($post->getComments() as $comment):?>
                    <li class="list-group-item">
                        <div class="row">
                           
                                  <div class="col-xs-1" style="background:#292e36;color:white">

                                    <?=$comment->getUsername()?>


                                    </div>
                                <div class="col-xs-3">

                                    <div class="comment-text">
                                        <?=$comment->content?>
                                    </div>



                                </div>

                            <div class="col-xs-1" style="margin-right:0">

                                <span class="left"><?php
                                    $date1=new DateTime(new \yii\db\Expression('NOW'));
                                    $date2=new DateTime($comment->commentDate);
                                        $interval = $date1->diff($date2)->days+1;
                                        echo($interval);
                                    echo(' j');

                                        ?>


                                </span>
                            </div>


                                
                            </div>
                    </li>
                        <?php endforeach ?>
                    

                </ul>
                
      </div>

        <?php if(Yii::$app->user->isGuest):?>

        <?php else :?>

            <?php $form = ActiveForm::begin(['action'=>['post/comment']]);     ?>

            <?= $form->field($commentForm, 'content')->label(false) ?>

            <?= $form->field($commentForm, 'postID')->hiddenInput(['value' => $post->id])->label(false); ?>


            <div class="form-group">
                <?= Html::submitButton('Commenter', ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        <?php endif ?>

                </div>  
</div>

    