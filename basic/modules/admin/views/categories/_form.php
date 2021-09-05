<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Categories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categories-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_name')->textInput(['maxlength' => true]) ?>

    <fieldset>
        <?= $form->field($model, 'img')->fileInput(); ?>
        <?php
            if (!empty($model->img)) {
                $img = Yii::getAlias('@webroot/') . '/img/categories/source/' . $model->img;
                if (is_file($img)) {
                    $url = Yii::getAlias('@web/') . '/img/categories/source/'. $model->img;
                    echo 'Уже загружено ', Html::a('изображение', $url, ['target' => '_blank']);
                }
            }
        ?>
    </fieldset>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
