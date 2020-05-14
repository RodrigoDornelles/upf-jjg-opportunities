<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap4\Tabs;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Nav;

use frontend\assets\AppAsset;

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
<?php $this->beginBody() ?>

<?php 
NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'options' => [
        'class' => 'navbar navbar-dark bg-primary fixed-top'
    ]
]);
echo Nav::widget([
    'items' => [
        ['label' => 'Home', 'url' => ['/site/index'], 'visible' => !Yii::$app->user->isGuest],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Sair', 'url' => ['/authentication/logout']],
    ],
    'options' => ['class' => 'navbar-nav'],
]);
NavBar::end();
?>

<main class="wrap">
    <div class="container">
        <?= $content ?>
    </div>
</main>

<?php if(!Yii::$app->user->isGuest):?>
<footer class="footer fixed-bottom">
    <?=Tabs::widget([
        'options' => [
            'class' => 'nav-fill bg-light'
        ], 
        'items' => [
            [
                'label' => Yii::t('app', 'HELPER_TAB'),
                'link' => Url::home(),
                'active' => true
            ],
            [
                'label' => Yii::t('app', 'CHALLENGES_TAB'),
                'link' => '#',
                'disabled' => true
            ],
            [
                'label' => Yii::t('app', 'PROGRESS_TAB'),
                'link' => '#',
                'disabled' => true
            ],
        ]
    ])?>
</footer>
<?php endif?>

<?= \dominus77\sweetalert2\Alert::widget(['useSessionFlash' => true]) ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
