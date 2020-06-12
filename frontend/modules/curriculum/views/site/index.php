<?php 

use yii\widgets\DetailView;

$this->title = Yii::t('app', 'Curriculum');
?>

<section> 
<?= $this->render('@frontend/views/commons/_crudHeader',[
    'showButtons' => [
        'custom' => [
            [
                'title' => 'Download',
                'url' => '/curriculo/pdf',
                'options' => [ 'class' => 'btn btn-info' ]
            ],
            [
                'title' => 'View',
                'url' => '/curriculo/pdf',
                'options' => [ 'class' => 'btn btn-info' ]
            ],
            [
                'title' => 'Update',
                'url' => '/agendamentos-assunto',
                'options' => [ 'class' => 'btn btn-info' ]
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

