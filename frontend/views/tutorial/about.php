<?php

use yii\helpers\Html;
?>
<section class="row justify-content-center">
    <div class="col-10 col-md-8 col-lg-6">
        <h2 class="text-center">
            <?=Yii::t('app', 'ABOUT_TITLE')?>
        </h2>

        <p class="lead text-jutify">
            <?=Yii::t('app', 'ABOUT_TEXT')?>
        </p>

        <div class="text-center">
            <?=Html::a(Yii::t('app', 'PREV_BTN'), 'javascript:;', [
                'class' => 'd-inline btn btn-lg btn-warning btn-slider-prev'
            ])?>
            <?=Html::a(Yii::t('app', 'NEXT_BTN'), 'javascript:;', [
                'class' => 'd-inline btn btn-lg btn-success btn-slider-next'
            ])?>
        </div>
    </div>
</section>