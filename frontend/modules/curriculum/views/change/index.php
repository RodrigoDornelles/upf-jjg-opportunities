<?php 

use kartik\icons\Icon;
use common\models\my\CurriculumLanguage;
use common\models\my\CurriculumGraduate;
use common\models\my\CurriculumExperience;

$this->title = Yii::t('app', 'Curriculum - Changes');
?>

<?= $this->render('@frontend/views/commons/_crudHeader',[
    'showButtons' => [
        'custom' => [
            [
                'title' => Icon::show('print').'Print Now',
                'url' => '/curriculum/pdf',
                'options' => [ 'class' => 'btn btn-rounded btn-outline-info', 'target' => '_blank' ]
            ],
            [
                'title' => Icon::show('info').'Detais',
                'url' => '/curriculum',
                'options' => [ 'class' => 'btn btn-rounded btn-outline-info' ]
            ],
        ],
    ]
])?>

<section class="row justify-content-center">
    <div class="col-md-11 col-lg-9">
    <hr/>

    <?=$this->render('_form', [
        'model' => $model
    ])?>
    </div>
</section>