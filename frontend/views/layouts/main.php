<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style>
body::before{
     background: url('<?= Yii::getAlias('@web') ?>/uploads/bg.jpg');
     content: '';
    z-index: -1;
    opacity: 0.5;
    width: 100%;
    height: 100%;
    position:absolute; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    -webkit-filter: blur(8px);
    -moz-filter: blur(8px);
    -o-filter: blur(8px);
    -ms-filter: blur(8px);
    filter: blur(8px);
    }
</style>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/uploads/logo.png', ['alt'=>Yii::$app->name, 'style' => 'max-height: 100%;height: 100%;margin: 0 auto;']),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/']],
        ['label' => 'Data Perawat', 'url' => ['/perawat']],
        ['label' => 'Pojok Konseling', 'url' => ['/site/contact']],
        ['label' => 'Reservasi dan Janji', 'url' => ['/homecare']],
        ['label' => 'Tentang Kami', 'url' => ['/site/about']],
        [
            'label' => 'Artikel',
            'items' => [
                 ['label' => 'Keperawatan Keluarga', 'url' => '/keperawatan-keluarga'],
                 ['label' => 'Keperawatan Anak', 'url' => '/keperawatan-anak'],
                 ['label' => 'Keperawatan Maternitas', 'url' => '/keperawatan-maternitas'],
                 ['label' => 'Keperawatan Lanjut Usia', 'url' => '/lanjut-usia'],
                 ['label' => 'Keperawatan Jiwa', 'url' => '/keperawatan-jiwa'],
            ],
        ],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = ['label' => 'Data Kesehatan Keluarga', 'url' => ['/keluarga']];
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">
            <?= Html::img('@web/uploads/logo.png', ['alt'=>Yii::$app->name, 'width' => '5%', 'height' => '5%']) ?>
            &copy; <?= Yii::$app->name.' '.date('Y') ?>
        </p>

    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
