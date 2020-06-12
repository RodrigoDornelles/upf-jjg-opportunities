<?php
use yii\helpers\Html;

$controller = \Yii::$app->controller->id;

$add = [
    'title' => 'Incluir Novo Registro',
    'url' => $controller.'/create',
    'options' => [
        'class' => 'btn btn-success'
    ]
];

$edit = [
    'title' => 'Editar Registro',
    'url' => $controller.'/update',
    'options' => [
        'class' => 'btn btn-warning'
    ]
];

$delete = [
    'title' => 'Excluir Registro',
    'url' => $controller.'/delete',
    'options' => [
        'class' => 'sa-delete btn btn-danger',
        'data-redirect' => yii\helpers\Url::to(['index'])
    ]
];

$view = [
    'title' => 'Visualizar Registro',
    'url' => $controller.'/view',
    'options' => [
        'class' => 'btn btn-info'
    ]
];

$list = [
    'title' => 'Listar Registros',
    'url' => $controller,
    'options' => [
        'class' => 'btn btn-info'
    ]
];

$buttons = [
    'add' => $add,
    'edit' => $edit,
    'delete' => $delete,
    'view' => $view,
    'list' => $list,
    'custom' => []
];

?>

<div class="header">
    <h4 class="title text-center"><strong><?= Html::encode($this->title) ?></strong></h4>
    <p class="category text-right paddingButton">
        <? foreach ($buttons as $type => $button) {

                if (array_key_exists($type,$showButtons)) {

                    foreach($showButtons[$type] as $key => $value) {

                        if (isset($button[$key])) {
                           $button[$key] = $value;
                        } else if ($type == 'custom') {

                            if (is_array($value)) {
                                $button[] = $value;
                            } else {
                                $button[$key] = $value;
                            }

                        }
                    }

                    if (is_array(current($button))) {
                        foreach ($button as $btn) {
                            echo "&nbsp";
                            echo Html::a($btn['title'], [$btn['url']], $btn['options']);
                        }
                    } else {
                        echo "&nbsp";
                        echo Html::a($button['title'], [$button['url']], $button['options']);
                    }
                }
           }
        ?>
    </p>
</div>