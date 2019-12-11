<?php use yii\widgets\LinkPager; ?>

<h1 >Liste des posts</h1>
<?php foreach ($posts as $post): ?>
        
        <?= $this->render('postCard',['post'=>$post,'commentForm'=>$commentForm]) ?>
        
        <hr>
    

    
<?php endforeach; ?>
<?= LinkPager::widget(['pagination' => $pagination]) ?>