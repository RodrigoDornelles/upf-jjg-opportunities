<?php 

use yii\helpers\Html;
?>

<section class="row justify-content-center">
    <div class="col-md-9 col-lg-6">

    <h2><?=Yii::t('app', 'Let\'s start?')?></h2>
    <p class="text-justify"><?=Yii::t('app', 'please type a little bit about yourself')?></p>

    <?=$this->render('_form', [
        'model' => $model
    ])?>
    </div>
</section>