<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use kv4nt\owlcarousel\OwlCarouselWidget;

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


<?php OwlCarouselWidget::begin([
    'container' => 'main',
    'pluginOptions'    => [
        'autoplay'          => false,
        'nav'               => true,
        'items'             => 1,
        'loop'              => false,
        'itemsDesktop'      => [1199, 3],
        'itemsDesktopSmall' => [979, 3]
    ]
])?>
    <?=$content?>
<?php OwlCarouselWidget::end(); ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
