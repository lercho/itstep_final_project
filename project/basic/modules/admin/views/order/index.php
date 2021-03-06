<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'surname',
            'email:email',
            'phone',
            'comment',
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
            'updated',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
