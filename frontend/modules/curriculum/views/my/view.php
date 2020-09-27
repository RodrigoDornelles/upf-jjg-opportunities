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
                'title' => Icon::show('print').'Print Now',
                'url' => '/curriculum/my/pdf',
                'options' => [ 'class' => 'btn btn-rounded btn-outline-info', 'target' => '_blank' ]
            ],
            [
                'title' => Icon::show('pen').'Update',
                'url' => '/curriculum/my/update',
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
                    'abstract:nText',
                    'date_created_at:relativeTime',
                    'date_updated_at:relativeTime'
                ]
            ])?>
        </div>
    </div>
</section>