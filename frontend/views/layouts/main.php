<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap4\Tabs;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Nav;
use kartik\icons\Icon;

use frontend\assets\AppAsset;

AppAsset::register($this);
Icon::map($this);
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
<body class="bg-black text-white" >
<?php $this->beginBody() ?>

<?php 
NavBar::begin([
    'brandLabel' => Html::img('@jjg/logo-white-1.png', ['alt' => Yii::$app->name, 'width' => 32]),
    'options' => [
        'class' => 'navbar navbar-dark bg-dark fixed-top'
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
<footer class="footer fixed-bottom tab-bottom">
    <?=Tabs::widget([
        'encodeLabels' => false,
        'items' => [
            [
                'label' => Icon::show('address-card').Yii::t('app', 'Curriculum'),
                'active' => Yii::$app->controller->module->id == 'curriculum',
                'url' => ['/curriculum/site/index'],
            ],        
            [
                'label' => Icon::show('graduation-cap').Yii::t('app', 'Class'),
                'active' => Yii::$app->controller->module->id == 'classroom',
                'url' => ['/classroom/site/index'],
            ],
            [
                'label' => Icon::show('suitcase').Yii::t('app', 'Jobs'),
                'active' => Yii::$app->controller->module->id == 'jobs',
                'url' => ['/jobs/site/index'],
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
