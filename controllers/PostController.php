<?php
namespace app\controllers;

use app\models\Comment;
use app\models\CommentForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\PostForm;
use yii\data\Pagination;
use app\models\Post;



class PostController extends Controller
{





    public function actionIndex()
    {   

        
        $query =Post::getPosts();
        
        $pagination = new Pagination([
            'defaultPageSize' => 2,
            'totalCount' => $query->count(),
        ]);

        $posts = $query->orderBy('postDate  ')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();


            $model = new PostForm();

            $commentForm=new CommentForm();
        return $this->render('index', [
            'posts'=>$posts,
            'model'=>$model,
            'commentForm'=>$commentForm,
            'pagination' => $pagination,
        ]);

        
    
    }



    public function  actionSwitch($mp){
        
            
        $query =($mp=='true')? (Post::getUserPosts( Yii::$app->user)) :Post::getPosts();
        
        $pagination = new Pagination([
            'defaultPageSize' => 2,
            'totalCount' => $query->count(),
        ]);

        $posts = $query->orderBy('postDate  ')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();


            
        return $this->renderPartial('postList', [
            'posts'=>$posts,
            'commentForm'=>new CommentForm(),
            'pagination' => $pagination,
        ]);

        

    }






    





    public function actionPost(){

        $model = new PostForm();
        if ($model->load(Yii::$app->request->post()) && $model->createPost()) {
            Yii::$app->session->setFlash('Post');

            return $this->actionIndex();
        }


    }

    public function actionComment(){
        $commentForm=new CommentForm();
        if($commentForm->load(Yii::$app->request->post()) && $commentForm->createComment()) {


            return $this->actionIndex();


        }


            }






}