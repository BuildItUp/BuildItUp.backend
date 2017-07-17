<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use common\models\Worker;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<?php 
    $worker = Worker::findOne(['user_id'=>Yii::$app->user->identity->id]);
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
 <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <?= Html::cssFile('@web/css/bootstrap.min.css') ?>
    <!-- Custom CSS -->
    <!-- <link href="css/simple-sidebar.css" rel="stylesheet"> -->
    <?= Html::cssFile('@web/css/simple-sidebar.css') ?>
    <?= Html::cssFile('@web/css/site.css') ?>
<body class="transparent">
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    // NavBar::begin([
    //     'brandLabel' => 'My Company',
    //     'brandUrl' => Yii::$app->homeUrl,
    //     'options' => [
    //         'class' => 'navbar-inverse navbar-fixed-top',
    //     ],
    // ]);
    // $menuItems = [
    //     ['label' => 'Home', 'url' => ['/site/index']],
    //     ['label' => 'Worker', 'url' => ['/worker/index']],
    //     ['label' => 'Progress', 'url' => ['/progress/index']],
    //      ['label' => 'Provinces', 'url' => ['/provinces/index']],
    // ];
    // if (Yii::$app->user->isGuest) {
    //     $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    // } else {
    //     $menuItems[] = '<li>'
    //         . Html::beginForm(['/site/logout'], 'post')
    //         . Html::submitButton(
    //             'Logout (' . Yii::$app->user->identity->username . ')',
    //             ['class' => 'btn btn-link logout']
    //         )
    //         . Html::endForm()
    //         . '</li>';
    // }
    // echo Nav::widget([
    //     'options' => ['class' => 'navbar-nav navbar-right'],
    //     'items' => $menuItems,
    // ]);
    // NavBar::end();

    ?>
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <?= Html::img('@web//icon/builditup-icon-apps.png'); ?>
                <!-- <img src="../../frontend/web/icon/builditup-icon-apps.png" class="icon-slide"> -->
                <li class="sidebar-brand"> 
                    <a href="#">
                       Build It Up!
                    </a>
                </li>
                <li>
                    <?= Html::a('Home',['site/index'])?>
                </li>
              
                <?php 
                        if(isset(Yii::$app->user->identity)){?>
                <li>
                    <?= Html::a('Projects',['project/index'])?>
                </li>
                <?php } ?>
                <?php 
                        if(isset(Yii::$app->user->identity)){?>
                <li>
                    <?= Html::a('Notifications',['notification/index'])?>
                </li>
                <?php }?>
                <?php 
                        if(isset(Yii::$app->user->identity)){?>
                 <li>
                    <?= Html::a('User',['user/index'])?>
                </li>
                <?php } ?>
                <?php 
                        if(isset(Yii::$app->user->identity)){?>
                  <li>
                    <?= Html::a('Progress',['project/update?id='.$worker->project_id])?>
                </li>
                <?php } ?>
                
                 <?php 
                        if(isset(Yii::$app->user->identity)){?>
                   <li>
                    <?= Html::a('Budget',['cash-flow/index'])?>
                </li>
                  <?php } ?>
                <?php 
                        if(isset(Yii::$app->user->identity)){?>
                  <li>
                    <?= Html::a('Account',['worker/view?id='.Yii::$app->user->identity->id])?>
                </li>
                <?php } ?>
                 <?php 
                        if(isset(Yii::$app->user->identity)){?>
                   <li>
                    <?= Html::a('Withdrawal Log',['budget-log/index'])?>
                </li>
                  <?php } ?>
                   <?php if(Yii::$app->user->isGuest) {
                            ?><li>    <?= Html::a('Login',['site/login'])?> </li>
                       <?php }
                    else
                        {
                            ?><li>   <?= Html::beginForm(['/site/logout'], 'post')
                             . Html::submitButton(
                                 'Logout (' . Yii::$app->user->identity->username . ')',
                                 ['class' => 'btn btn-link logout']
                             )
                        . Html::endForm()
                        ?></li> <?php
                        }
                ?>
            </ul>
        </div>
   
    <div id="page-content-wrapper">
    <div class="container-fluid">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
         
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<!-- 
<footer class="footer">
    <div class="container-fluid">
        <p class="pull-left">&copy; TimBersaw <?= date('Y') ?></p>

        <p class="pull-right"><a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a></p>
        
    </div>
</footer> -->
 </div>
<?= Html::jsFile('@web/js/jquery.js') ?>
    <!-- Bootstrap Core JavaScript -->
    
    <?= Html::jsFile('@web/js/bootstrap.min.js') ?>
    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
    <script>
        $("#wrapper").toggleClass("toggled");
    </script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
