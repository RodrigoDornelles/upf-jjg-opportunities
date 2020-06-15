<?php 

use yii\widgets\DetailView;
use kartik\icons\Icon;

$this->title = Yii::t('app', 'Curriculum');
?>

<section> 
<?= $this->render('@frontend/views/commons/_crudHeader',[
    'showButtons' => [
        'custom' => [
            [
                'title' => Icon::show('eye').'View',
                'url' => '/curriculum/site/view',
                'options' => [ 'class' => 'btn btn-rounded btn-outline-info' ]
            ],
            [
                'title' => Icon::show('pen').'Update',
                'url' => '/curriculum/change',
                'options' => [ 'class' => 'btn btn-rounded btn-outline-info' ]
            ],
        ],
    ]
])?>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <?=DetailView::widget([
                'model' => $model,
                'options' => [
                    'class' => 'table table-dark table-striped table-bordered detail-view'
                ],
                'attributes' => [
                    'user.name',
                    'user.age',
                    'user.countryWithFlag:raw',
                    'user.email:email',
                    [
                        'format' => 'raw',
                        'attribute' => 'language', 
                        'value' => function ($model) {
                            return $model->getRelationNames('curriculumLanguages');
                        }
                    ],
                    [
                        'format' => 'raw',
                        'attribute' => 'graduate', 
                        'value' => function ($model) {
                            return $model->getRelationNames('curriculumGraduates', ['attribute' => ['institute', 'name'], 'separator' => "\t-\t"]);
                        }
                    ],
                    [
                        'format' => 'raw',
                        'attribute' => 'experience', 
                        'value' => function ($model) {
                            return $model->getRelationNames('curriculumExperiences', ['attribute' => ['name', 'role'], 'separator' => "\t-\t"]);
                        }
                    ],
                    'abstract:nText',
                    'date_created_at:relativeTime',
                    'date_updated_at:relativeTime'
                ]
            ])?>
        </div>
    </div>
</section>

