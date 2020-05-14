<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use kv4nt\owlcarousel\OwlCarouselWidget;

AppAsset::register($this);

$this->registerJs("
jQuery('.btn-slider-next').click(function(){
    jQuery('#owl-slider-layout').trigger('next.owl.carousel');
});
jQuery('.btn-slider-prev').click(function() {
    jQuery('#owl-slider-layout').trigger('prev.owl.carousel');
});
", $this::POS_END);

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
    'id' => 'owl-slider-layout',
    'container' => 'main',
    'pluginOptions'    => [
        'autoplay'          => false,
        'items'             => 1,
        'loop'              => false,
    ]
])?>
    <?=$content?>
<?php OwlCarouselWidget::end(); ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
