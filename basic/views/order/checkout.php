<?php

/*
* Страница оформления заказа, файл views/order/checkout.php
*/
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$name = '';
$surname = '';
$email = '';
$phone = '';
$delivery_option = '';
$city = '';
$delivery_department = '';
$payment_method = '';
$comment = '';

if (Yii::$app->session->hasFlash('checkout-data')) {
    $data = Yii::$app->session->getFlash('checkout-data');
    $name = Html::encode($data['name']);
    $surname = Html::encode($data['surname']);
    $email = Html::encode($data['email']);
    $phone = Html::encode($data['phone']);
    $delivery_option = Html::encode($data['delivery_option']);
    $city = Html::encode($data['city']);
    $delivery_department = Html::encode($data['delivery_department']);
    $payment_method = Html::encode($data['payment_method']);
    $comment = Html::encode($data['comment']);
}

?>

<!-- Checkout Section Begin -->
<section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                    <h4>Оформление заказа</h4>
                    <div id="checkout">
                    <?php
                        $success = false;
                        if (Yii::$app->session->hasFlash('checkout-success')) {
                        $success = Yii::$app->session->getFlash('checkout-success');
                        }
                    ?>
                    <?php if (!$success): ?>
                        <?php if (Yii::$app->session->hasFlash('checkout-errors')):
                        ?>
                        <div class="alert alert-warning alert-dismissible"
                        role="alert">
                            <button type="button" class="close"
                            data-dismiss="alert" aria-label="Закрыть">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            <p>При заполнении формы допущены ошибки</p>
                            <?php $allErrors = Yii::$app->session->getFlash('checkout-errors'); ?>
                            <ul>
                            <?php foreach ($allErrors as $errors): ?>
                                <?php foreach ($errors as $error): ?>
                                <li><?= $error; ?></li>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php
                    $form = ActiveForm::begin(
                    ['id' => 'checkout-form', 'class' => 'form-horizontal']
                    );
                    ?>
                        <div class="row">
                                <div class="col-lg-8 col-md-6">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="checkout__input">
                                                <?= $form->field($order, 'name')->textInput(['autofocus' => true, 'value' => $name])->label('Имя<span>*</span>'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="checkout__input">
                                                <?= $form->field($order, 'surname')->textInput(['value' => $surname])->label('Фамилия<span>*</span>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="checkout__input">
                                                <?= $form->field($order, 'phone')->textInput(['value' => $phone])->label('Телефон<span>*</span>'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="checkout__input">
                                                <?= $form->field($order, 'email')->input('email', ['value' => $email])->label('Имейл<span>*</span>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="checkout__input">
                                        <?= $form->field($order, 'payment_method')->radioList(['cash' => 'Наличными при получении', 'card' => 'На карту Приватбанка'], ['value' => $payment_method])->label('Оплата<span>*</span>') ?>
                                    </div>
                                    
                                    <div class="checkout__input">
                                        <div class="checkout__input">
                                            <?= $form->field($order, 'delivery_option')->radioList(['novaposhta' => 'Нова Пошта', 'justin' => 'Justin'], ['value' => $delivery_option])->label('Доставка<span>*</span>') ?>
                                        </div>
                                        <div class="checkout__input">
                                                <?= $form->field($order, 'city')->textInput(['value' => $city])->label('Город<span>*</span>'); ?>
                                            </div>
                                        <div class="checkout__input">
                                                <?= $form->field($order, 'delivery_department')->textInput(['value' => $delivery_department])->label('Отделение<span>*</span>'); ?>
                                            </div>
                                    </div>
                                    
                                    <div class="checkout__input">
                                        <?= $form->field($order, 'comment')->textarea(['rows' => 6, 'value' => $comment])->label('Комментарий');?>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="checkout__order">
                                        <h4>Ваш Заказ</h4>
                                        <ul>
                                            <?php foreach ($basket['products'] as $record): ?>
                                                <li><?= $record['name']; ?><span><?= $record['price']; ?> грн.</span></li>
                                            <?php endforeach;?>
                                        </ul>
                                        <div class="checkout__order__total">Всего <span><?= $basket['amount']; ?> грн.</span></div>
                                        <?= Html::submitButton('ЗАКАЗАТЬ', ['class' => 'site-btn']); ?>
                                    </div>
                                </div>
                        </div>

                    <?php ActiveForm::end(); ?>
                    <?php else: ?>
                        <p>Ваш заказ успешно оформлен, спасибо за покупку!</p>
                        <p>Мы свяжемся с вами в ближайшее время.</p>
                    <?php endif; ?>
                </div>
                    </div>
        
            
        </div>
    </section>
    <!-- Checkout Section End -->