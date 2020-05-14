<?php

use yii\helpers\Html;
?>
<section class="row justify-content-center">
    <div class="col-10 col-md-8 col-lg-6">

        <h2 class="text-center">
            <?=Yii::t('app', 'FINISH_TITLE')?>
        </h2>

        <p class="lead text-jutify">
            <?=Yii::t('app', 'FINISH_TEXT')?>
        </p>

        <?=Html::beginForm('', 'post', ['class' => 'text-center'])?>
            <?=Html::submitButton(Yii::t('app', 'BEGIN_BTN'), [
                'class' => 'btn-center btn-success btn btn-lg'
            ])?>
        <?=Html::endForm()?>
        
    </div>
</section>