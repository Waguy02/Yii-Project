
<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;

use yii\bootstrap\ActiveForm;



?>


                <div class="well">
                    <h2><i class="fa fa-search"></i>Filtre</h2>
                    <hr>

                    <div class="form-group form-inline well">
                    <label for='my_posts'> Mes Posts  :</label>
                <?= Html::checkbox('my_posts',false,['class'=>'form-control ','id'=>'ckMp','prompt'=>'Mes Posts']); ?>
                    </div>






                        <?php
             $this->registerJs(
                 '
                 
                 
                 $("input[name=my_posts]").change(function() {
                     if($(this).is(":checked")) {
                            
                           selected=true;
                            
                            
                         } else {
                                selected=false;
                         }

                         
                         $.get("'.Url::toRoute('post/switch').'",{mp:selected} ).done(function(data){
                                
                                $("#postListDiv").html(data);
                                });
                     })
                        ');
                
              ?>

                        
                </div>




                <div class="well">
                    <h2><i class="fa fa-search"></i>Création d'un Post</h2>
                    <hr>
                     <?php  $form = ActiveForm::begin([
                                'id' => 'post-form',
                                'action'=>['post/post'],
                                'layout' => 'horizontal',
                                'fieldConfig' => [
                                    'template' => "{label}\n<div class=\"well\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                                    'labelOptions' => ['class' => 'col-lg-1 control-label'],
                                ],
                                'options' => [
                                    'class' => 'post-form'
                                ]
                            ]); ?>
                            

                            <?php


                                        ?>

 
 <?php
           /*  $this->registerJs(
                 '
                                                  
 jQuery(document).ready(function($) {
       $("#post-form").submit(function(event) {
           
            event.preventDefault(); // stopping submitting
            var data = $(this).serializeArray();
            alert("Soumission");
            $.ajax({
                url: "post/post",
                type: "post",
                data: data,
                dataType: "json"
            })
            .done(function(response) {
                $("#postListDiv").html(response);

            }   )
            .fail(function(error) {
                console.log(error);
            });
        
        });
    });
                            
    ');*/ ?>

                    
        <?= $form->field($model, 'title')->textInput(['autofocus' => true]) ?>

<?= $form->field($model, 'content')->textArea([]) ?>


<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Créer  le post', ['class' => 'btn btn-primary', 'name' => 'post-button']) ?>
    </div>
</div>

<?php $form->end(); ?>


                </div>












               