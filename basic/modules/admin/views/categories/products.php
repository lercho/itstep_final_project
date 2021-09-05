<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары из категории: ' . $category_name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Добавить новый товар', ['products/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Название</th>
                <th>Категория</th>
                <th>Изображение</th>
                <th>Цена</th>
                <th>Дата создания</th>
                <th><span class="glyphicon glyphicon-eye-open"></span></th>
                <th><span class="glyphicon glyphicon-pencil"></span></th>
                <th><span class="glyphicon glyphicon-trash"></span></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products_arr as $product): ?>
                <tr>
                <td><?= $product['prod_name']; ?></td>
                <td><?= $category_name; ?></td>
                <td><?= $product['img_1']; ?></td>
                <td><?= $product['price']; ?></td>
                <td><?= $product['createdAt']; ?></td>

                <td>
                    <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['/admin/products/view', 'id' => $product['id']]); ?>
                </td>
                <td>
                    <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['/admin/products/update', 'id' => $product['id']]); ?>
                </td>
                <td>
                    <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['/admin/products/delete', 'id' => $product['id']],
                        [
                            'data-confirm' => 'Вы уверены, что хотите удалить эту 
                            категорию?',
                            'data-method' => 'post'
                        ]
                    );
                ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
   


</div>
