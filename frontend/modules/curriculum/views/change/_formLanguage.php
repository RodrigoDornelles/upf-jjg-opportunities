<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\bootstrap4\ActiveForm;
use kartik\grid\GridView;

use common\models\my\CurriculumLanguage;
$this->registerJs('jQuery("#form-curriculum-language").on("pjax:end", function() {jQuery.pjax.reload({container:"#grid-curriculum-language"})});');
?>

<!--IDIOMA -->
<?php timurmelnikov\widgets\LoadingOverlayPjax::begin(['id' => 'form-curriculum-language'])?> 
<?php $form = ActiveForm::begin([
    'action'=> ['/curriculum/change/create-language'],
    'options' => [
        'class' => '',
        'enctype' => 'multipart/form-data',
        'data-pjax' => true
    ],
])?>

<h5>Languages</h5>
<div class="row margin10B">
    <div class="col-md-6">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => "Languages"])->label(false)?>
    </div> 
    <div class="col-md-3">
        <?= $form->field($model, 'level')->dropDownList(CurriculumLanguage::LEVEL_LIST, ['prompt'=>'Level'])->label(false)?>
    </div>
    <div class="col-md-3">
        <?= Html::submitButton('Add', ['class' => 'btn btn-block btn-outline-success btn-rounded']) ?>
    </div>
</div> 
<?php ActiveForm::end()?>
<?php timurmelnikov\widgets\LoadingOverlayPjax::end()?>

<?php timurmelnikov\widgets\LoadingOverlayPjax::begin(['id' => 'grid-curriculum-language'])?>
<?=GridView::widget([
    'pjax' => true,
    'showHeader' => false,
    'layout' => '{items}',
    'dataProvider' => $model->dataProvider,
    'columns' => $model->gridColumns,
    'tableOptions' => ['class' => 'table table-dark table-striped table-bordered'],
])?>    
<?php timurmelnikov\widgets\LoadingOverlayPjax::end() ?>