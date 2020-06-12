<?php 

use yii\bootstrap4\activeForm;
use yii\helpers\Html;

?>


<?php $form = activeForm::begin()?>
    <div class="d-none">
        <?= $form->field($model, 'id_user')->hiddenInput() ?>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'abstract')->textArea(['autofocus' => true, 'rows' => 4, 'max-legnt' => true]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Próximo', ['class' => 'btn btn-block btn-rounded btn-outline-primary', 'name' => 'login-button']) ?>
    </div>
<?php activeForm::end()?>
