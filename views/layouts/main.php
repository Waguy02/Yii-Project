<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>



    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<style>
.mix {
    min-height:370px;
}

nav.navbar-custom { 
 background:#292e36;
 border-color: #488cf6; 
 box-shadow: 0 0 12px 0 #ccc; 
}
nav.navbar-custom a { 
    color: #dfe0ed; 
}
nav.navbar-custom ul.navbar-nav a { 
    color: #dfe0ed; 
    border-style: solid; 
    border-width: 0 0 2px 0; 
    border-color: #fff; 
}
    
nav.navbar-custom ul.navbar-nav a:hover,
nav.navbar-custom ul.navbar-nav a:visited,
nav.navbar-custom ul.navbar-nav a:focus,
nav.navbar-custom ul.navbar-nav a:active { 
    background: #5CB85C; 
}
nav.navbar-custom ul.navbar-nav a:hover { 
    border-color: #5CB85C; 
}
nav.navbar-custom li.divider { 
    background: #5CB85C; 
}
nav.navbar-custom button.navbar-toggle { 
    background: #5CB85C; 
    border-radius: 2px; 
}
nav.navbar-custom button.navbar-toggle:hover { 
    background: #999; 
}
nav.navbar-custom button.navbar-toggle > span.icon-bar { 
    background: #fff; 
}
nav.navbar-custom ul.dropdown-menu { 
    border: 0; 
    background: #fff; 
    border-radius: 4px; 
    margin: 4px 0; 
    border: 2px solid #5CB85C;
    box-shadow: 0 0 4px 0 #ccc; 
}
nav.navbar-custom ul.dropdown-menu > li > a { 
    color: black; 
}
nav.navbar-custom ul.dropdown-menu > li > a:hover { 
    background: #5CB85C; color: #fff; 
}
nav.navbar-custom span.badge { 
    background: #5CB85C; 
    font-weight: normal; 
    font-size: 11px;
     margin: 0 4px; 
}
nav.navbar-custom span.badge.new { 
    background: rgba(255, 0, 0, 0.8); color: #fff; 
}

</style>


<?php $this->beginBody() ?>



    <?php
    
 NavBar::begin([
        'brandLabel' => "Blog de 4GI",

        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse   navbar-custom',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-custom '],
        'items' => [
            //['label' => 'Accueil', 'url' => ['/site/index']],
            ['label' => 'Posts', 'url' => ['/post/index']],
            ['label' => ' Utilisateurs', 'url' => ['/site/contact']],




            Yii::$app->user->isGuest ? (
                ['label' => 'Se connecter', 'url' => ['/site/login']]
                    ) :
            
                 (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Se déconnecter (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    
    ?> 

    <div class="col-lg-12">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>


<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
