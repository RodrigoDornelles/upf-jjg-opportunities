<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>


    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe')->checkbox() ?>

        <div style="color:#999;margin:1em 0">
            If you forgot your password you can <?= Html::a('reset it', ['request-password-reset']) ?>.
            <br/>
            Need new verification email? <?= Html::a('Resend', ['resend-verification-email']) ?>
            <br/>
            first time? <?= Html::a('Signup', ['signup']) ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Login', ['class' => 'btn btn-block btn-rounded btn-outline-primary', 'name' => 'login-button']) ?>
        </div>

    <?php ActiveForm::end(); ?>
    
</section>
