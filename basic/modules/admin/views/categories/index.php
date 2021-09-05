<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Добавить новую категорию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Наименование</th>
                <th><span class="glyphicon glyphicon-list"></span></th>
                <th><span class="glyphicon glyphicon-pencil"></span></th>
                <th><span class="glyphicon glyphicon-trash"></span></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
                <tr>
                <td><?= $category['category_name']; ?></td>
                <td>
                    <?= Html::a('<span class="glyphicon glyphicon-list"></span>', ['/admin/categories/products', 'id' => $category['id']]); ?>
                </td>
                <td>
                    <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['/admin/categories/update', 'id' => $category['id']]); ?>
                </td>
                <td>
                    <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['/admin/categories/delete', 'id' => $category['id']],
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
