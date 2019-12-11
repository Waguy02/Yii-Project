<?php
/**
 * Created by PhpStorm.
 * User: test
 * Date: 10/12/2019
 * Time: 20:43
 */

namespace app\models;


use phpDocumentor\Reflection\Types\Array_;
use yii\base\Model;
use yii\db\Expression;

class CommentForm extends Model
{

    public $content;
    public $postID;

    public function rules()
    {

        return
        [

            [['content','postID'],'required']


        ];





    }


    public function createComment(){

            if(!$this->validate())return false;
        $comment=new Comment();
        $comment->user=\Yii::$app->user->id;
        $comment->content=$this->content;
        $comment->post=$this->postID;

        $comment->commentDate=new \yii\db\Expression('NOW()');
        $comment->save();
        return true;

    }

}