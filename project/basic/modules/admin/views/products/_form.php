<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\admin\models\Categories;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form mx-200">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="checkout__input">
            <?= $form->field($model, 'prod_name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    
    <?php 
        $categories = Categories::getAllCategories(); 
        $categories_arr = [];
        foreach ($categories as $record) {
            $categories_arr[$record['id']] = $record['category_name'];
        }
    ?>

    <div class="row">
        <div class="checkout__input">
            <?= $form->field($model, 'category_id')->dropDownList($categories_arr)->label('Категория', ['class' => 'd-block mb-1']) ?>
        </div>
    </div>
    <div class="row">
        <div class="checkout__input mr-3">
            <fieldset>
                <?= $form->field($model, 'img_1')->fileInput(); ?>
                <?php
                    if (!empty($model->img_1)) {
                        $img = Yii::getAlias('@webroot/') . '/img/products/source/' . $model->img_1;
                        if (is_file($img)) {
                            $url = Yii::getAlias('@web/') . '/img/products/source/' . $model->img_1;
                            echo 'Уже загружено ', Html::a('изображение', $url, ['target' => '_blank']);
                        }
                    }
                ?>
            </fieldset>
        </div>
        
        <div class="checkout__input mr-3">
            <fieldset>
                <?= $form->field($model, 'img_2')->fileInput(); ?>
                <?php
                    if (!empty($model->img_2)) {
                        $img = Yii::getAlias('@webroot/') . $model->img_2;
                        if (is_file($img)) {
                            $url = Yii::getAlias('@web/') . $model->img_2;
                            echo 'Уже загружено ', Html::a('изображение', $url, ['target' => '_blank']);
                        }
                    }
                ?>
            </fieldset>
        </div>
        
    </div>
    <div class="row">
        <div class="checkout__input mr-3">
            <fieldset>
                    <?= $form->field($model, 'img_3')->fileInput(); ?>
                    <?php
                        if (!empty($model->img_3)) {
                            $img = Yii::getAlias('@webroot/') . $model->img_3;
                            if (is_file($img)) {
                                $url = Yii::getAlias('@web/') . $model->img_3;
                                echo 'Уже загружено ', Html::a('изображение', $url, ['target' => '_blank']);
                            }
                        }
                    ?>
            </fieldset>        
        </div>
        <div class="checkout__input mr-3">
            <fieldset>
                    <?= $form->field($model, 'img_4')->fileInput(); ?>
                    <?php
                        if (!empty($model->img_4)) {
                            $img = Yii::getAlias('@webroot/') . $model->img_4;
                            if (is_file($img)) {
                                $url = Yii::getAlias('@web/') . $model->img_4;
                                echo 'Уже загружено ', Html::a('изображение', $url, ['target' => '_blank']);
                                // echo $form->field($model,'remove')->checkbox();
                            }
                        }
                    ?>
            </fieldset>
        </div>
    </div>
    <div class="row">
        <div class="checkout__input mr-3">
            <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="checkout__input mr-3">
            <?= $form->field($model, 'material')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="checkout__input mr-3">
            <?= $form->field($model, 'width')->textInput() ?>
        </div>
        <div class="checkout__input mr-3">
            <?= $form->field($model, 'height')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="checkout__input">
            <?= $form->field($model, 'price')->textInput() ?>
        </div>
    </div>
    <div class="row">
    <div class="checkout__input">
            <?= $form->field($model, 'description_short')->textarea(['rows' => 6, 'maxlength' =>
true]);  ?>
        </div>
    </div>
    <div class="row">
        <div class="checkout__input">
            <?= $form->field($model, 'description_full')->textarea(['rows' => 6, 'maxlength' =>
true]);  ?>
        </div>
    </div>
    <div class="row">
        <div class="checkout__input">
            <?= $form->field($model, 'teg')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
