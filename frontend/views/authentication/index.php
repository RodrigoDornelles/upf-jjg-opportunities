<?php 

use yii\helpers\Html;
?>


<section class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <!-- TITULO -->
        <h1 class="display-1 text-center">
            <?=Html::a('JJG', false, [
                'alt' => 'job-journey-game',
                'title' => 'Job Journey Game',
            ])?>
        <h1>
        <!-- SUBTITULO -->
        <h2 class="display-4 text-center">
            <?=Html::a(Yii::t('app', 'Opportunities'), false, [
                'alt' => 'job-journey-game',
                'title' => 'Job Journey Game',
                'class' => 'text-lowercase'
            ])?>
        </h2>
        <hr/>

        <!-- BOTOES -->
        <section class="margin-auto w-50">
            <?=Html::a('login', ['authentication/login'], ['class'=>'btn btn-block btn-rounded btn-outline-secondary'])?>
            <?=Html::a('register', ['authentication/signup'], ['class'=>'btn btn-block btn-rounded btn-outline-secondary'])?>
        </section>
        <hr/>
            
        <!--SLOGAN -->
        <p class="display-5 text-center text-lowercase font-italic">
            <?=Yii::t('app', 'your journey starts here')?>
        </p>
    </div>
</section>