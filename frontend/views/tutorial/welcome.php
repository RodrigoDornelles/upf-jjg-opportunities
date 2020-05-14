<?php

use yii\helpers\Html;
?>
<section class="row justify-content-center">
    <div class="col-10 col-md-8 col-lg-6">

        <?=Html::img('@upf/logo-color-horizontal-complemento.png', [
            'alt' => 'logo upf'
        ])?>

        <h2 class="text-center">
            <?=Yii::t('app', 'WELCOME_TITLE')?>
        </h2>

        <p class="lead text-jutify">
            <?=Yii::t('app', 'WELCOME_TEXT')?>
        </p>

        <div class="text-center">
            <?=Html::a(Yii::t('app', 'NEXT_BTN'), 'javascript:;', [
                'class' => 'd-inline btn btn-lg btn-success btn-slider-next'
            ])?>
        </div>
    </div>
</section>