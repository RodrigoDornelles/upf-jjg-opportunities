<?php 

use yii\helpers\Html;

$this->title = Yii::t('app', 'Welcome {fulano}!', [
    'fulano' => Yii::$app->user->identity->name,
]);
?>

<section> 
    <h1><?=$this->title?></h1>
    <h2>how can we help you with your curriculum?</h2>
    <?=Html::a('view my curriculum', ['/curriculum/my/view'])?>
</section>

