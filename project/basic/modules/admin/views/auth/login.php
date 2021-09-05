<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Авторизация';

?>

<div class="container">
    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'email')->input('email'); ?>
        <?= $form->field($model, 'password')->input('password'); ?>
        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
