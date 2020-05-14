<?php

use yii\helpers\Html;
?>
<section class="row justify-content-center">
    <div class="col-10 col-md-8 col-lg-6">
    <div class="jumbotron">
        <h1 class="display-4">
            <?=Yii::t('app', 'FINISH_TITLE')?>
        </h1>

        <p class="lead">
            <?=Yii::t('app', 'FINISH_TEXT')?>
        </p>


        <?=Html::beginForm('', 'post')?>
            <?=Html::submitButton(Yii::t('app', 'BEGIN_BTN'), ['class' => 'btn-success btn btn-lg btn-block'])?>
        <?=Html::endForm()?>

    </div>
    </div>
</section>