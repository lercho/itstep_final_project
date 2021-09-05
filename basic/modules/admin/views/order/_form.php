<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php   
        $status_items = [
            0 => 'Новый',
            1 => 'Обработан',
            2 => 'Оплачен',
            3 => 'Доставлен',
            4 => 'Завершен',
        ];  
        $delivery_option_items = [
            'novaposhta' => 'Нова пошта',
            'justin' => 'Justin'
        ];
        $payment_method_items = [
            'cash' => 'Наличными при получении', 
            'card' => 'На карту Приватбанка'
        ]
    ?>

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="checkout__input">
            <?= $form->field($model, 'status')->dropDownList($status_items)->label('Статус', ['class' => 'd-block mb-1']); ?>
        </div>
    </div>
    <div class="row">
        <div class="checkout__input mr-3">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Имя', ['class' => 'd-block mb-1']); ?>
        </div>
        <div class="checkout__input">
            <?= $form->field($model, 'surname')->textInput(['maxlength' => true])->label('Фамилия', ['class' => 'd-block mb-1']); ?>
        </div>
    </div>
    <div class="row">
        <div class="checkout__input mr-3">
        <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label('Имейл', ['class' => 'd-block mb-1']); ?>
        </div>
        <div class="checkout__input">
        <?= $form->field($model, 'phone')->textInput(['maxlength' => true])->label('Телефон', ['class' => 'd-block mb-1']) ; ?>
        </div>
    </div>
    <div class="row">
        <div class="checkout__input">
        <?= $form->field($model, 'payment_method')->dropDownList($payment_method_items)->label('Способ оплаты', ['class' => 'd-block mb-1']) ; ?>
        </div>
    </div>
    <div class="row">
        <div class="checkout__input mr-3">
        <?= $form->field($model, 'delivery_option')->dropDownList($delivery_option_items)->label('Способ доставки', ['class' => 'd-block mb-1']); ?>
        </div>
        <div class="checkout__input mr-3">
        <?= $form->field($model, 'city')->textInput(['maxlength' => true])->label('Город', ['class' => 'd-block mb-1']) ; ?>
        </div>
        <div class="checkout__input">
        <?= $form->field($model, 'delivery_department')->textInput(['maxlength' => true])->label('Отделение доставки', ['class' => 'd-block mb-1']);  ?>
        </div>
    </div>
    <div class="row">
        <div class="checkout__input">
        <?= $form->field($model, 'comment')->textarea(['rows' => 6])->label('Комментарий'); ?>
        </div>
    </div>
    <div class="row">
        <div class="checkout__input mr-3">
        <?= $form->field($model, 'amount')->textInput(['readonly' => true])->label('Сумма заказа', ['class' => 'd-block mb-1']) ; ?>
        </div>
        <div class="checkout__input mr-3">
        <?= $form->field($model, 'created')->textInput(['readonly' => true])->label('Дата создания', ['class' => 'd-block mb-1']) ; ?>
        </div>
        <div class="checkout__input">
        <?= $form->field($model, 'updated')->textInput(['readonly' => true])->label('Дата обновления', ['class' => 'd-block mb-1']) ;  ?>
        </div>
    </div>
    
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
