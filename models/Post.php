<?php

namespace app\models;

use yii\db\ActiveRecord;

class Post extends ActiveRecord{

public static function getPosts()  
{
    return Post::find()->orderBy('postDate') ;
}



public static function getUserPosts($user){

    return Post::find()->where(['user'=>$user->id])->orderBy('postDate') ;


}


public static function getLastPosts($limit,$offset){

    return Post::find()->limit($lmiit)->offset($offset);
}



public function getUser(){
    
    $user=User::find()->where(['id'=>$this->user])->one();
    return $user;
}


public function getComments(){

    $comments=Comment::find()->where(['post'=>$this->id])->all();
    return $comments;
}

}
