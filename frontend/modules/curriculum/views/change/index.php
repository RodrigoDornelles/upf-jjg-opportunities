<?php 

use common\models\my\CurriculumLanguage;
use common\models\my\CurriculumGraduate;
use common\models\my\CurriculumExperience;

$this->title = Yii::t('app', 'Curriculum - Changes');
?>

<section> 
<?= $this->render('@frontend/views/commons/_crudHeader',[
    'showButtons' => []
])?>

<section class="row justify-content-center">
    <div class="col-md-9 col-lg-6">

    <?=$this->render('_formLanguage', [
        'model' => new CurriculumLanguage(['id_curriculum' => $model->id])
    ])?>
    <hr/>

    <?=$this->render('_formExperience', [
        'model' => new CurriculumExperience(['id_curriculum' => $model->id])
    ])?>
    <hr/>

    <?=$this->render('_formCurriculum', [
        'model' => $model
    ])?>
    </div>
</section>