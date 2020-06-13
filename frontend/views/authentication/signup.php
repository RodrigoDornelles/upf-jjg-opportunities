<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use common\models\Local;

use yii\widgets\MaskedInput;
use kartik\date\DatePicker;
use kartik\select2\Select2;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;

?>
<section class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    
    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

        <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'email') ?>

        <?= $form->field($model, 'country')->widget(Select2::classname(), [
            'data' => Local::getDropdownListCountrys(),
            'theme' => Select2::THEME_BOOTSTRAP,
            'options' => ['placeholder' => 'Select a state ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'escapeMarkup' => new yii\web\JsExpression("function(m) { return m; }"),
            ],
        ]) ?>

        <?= $form->field($model, 'date_birth')->widget(MaskedInput::className(), [
            'mask' => '99/99/9999',
        ])->widget(DatePicker::classname(), [
            'type' => DatePicker::TYPE_INPUT,
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd/mm/yyyy'
            ]
        ]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'password_repeat')->passwordInput() ?>


        <div class="form-group">
            <?= Html::submitButton('Signup', ['class' => 'btn btn-block btn-rounded btn-outline-primary', 'name' => 'signup-button']) ?>
        </div>

    <?php ActiveForm::end()?>
    </div>
</section>
