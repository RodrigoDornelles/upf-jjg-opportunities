<?php

use yii\helpers\Html;
?>
<section class="row justify-content-center">
    <div class="col-10 col-md-8 col-lg-6">
    <div class="jumbotron">
        <?=Html::img('@upf/logo-color-horizontal-complemento.png', [
            'alt' => 'logo upf'
        ])?>

        <h1 class="display-4"><?=Yii::t('app', 'WELCOME')?></h1>

        <p class="lead">
            <?=Yii::t('app', 'WELCOME_TEXT')?>
        </p>
    </div>
    </div>
</section>