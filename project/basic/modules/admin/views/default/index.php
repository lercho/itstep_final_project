<?php
/*
* Файл view-шаблона modules/admin/views/default/index.php
*/
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $queueOrders yii\data\ActiveDataProvider */
/* @var $processOrders yii\data\ActiveDataProvider */
$this->title = 'Главная';
?>

<h2>Новые заказы</h2>

<?=
    GridView::widget([
        'dataProvider' => $queueOrders,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            'email:email',
            'phone',
            'amount',
            [
                'attribute' => 'status',
                'value' => function ($data) {
                    switch ($data->status) {
                    case 0: return '<span class="text-danger">Новый</span>';
                    case 1: return '<span class="text-warning">Обработан</span>';
                    case 2: return '<span class="text-warning">Оплачен</span>';
                    case 3: return '<span class="text-warning">Доставлен</span>';
                    case 4: return '<span class="text-success">Завершен</span>';
                    default: return 'Ошибка';
                    }
                },
                'format' => 'html'
            ],
                'created',
                'updated'
        ],
    ]);
   ?>

   <h2>Заказы в работе</h2>

   <?=
    GridView::widget([
        'dataProvider' => $processOrders,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            'email:email',
            'phone',
            'amount',
            [
                'attribute' => 'status',
                'value' => function ($data) {
                    switch ($data->status) {
                        case 0: return '<span class="text-danger">Новый</span>';
                        case 1: return '<span class="text-warning">Обработан</span>';
                        case 2: return '<span class="text-warning">Оплачен</span>';
                        case 3: return '<span class="text-warning">Доставлен</span>';
                        case 4: return '<span class="text-success">Завершен</span>';
                        default: return 'Ошибка';
                    }
                },
                'format' => 'html'
            ],
            'created',
            'updated'
        ],
    ]);
   ?>
   