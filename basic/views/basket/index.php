    <!-- Shoping Cart Section Begin -->
    <?php if (!empty($basket)): ?>
    <section class="shoping-cart spad" id="basket-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 ">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Товары</th>
                                    <th>Цена</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($basket['products'] as $id => $item): ?>
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <?= yii\helpers\Html::img('@web/img/products/cart/'.$item['img'], ['alt' => 'paramonova']) ?>
                                            <h5><?= $item['name']; ?></h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                        <?= $item['price']; ?> грн.
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <a href="<?= yii\helpers\Url::to(['basket/remove', 'id' => $id]); ?>" class="remove-item"><span class="icon_close"></span></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Сумма покупки</h5>
                        <ul>
                            <li>Всего <span><?= $basket['amount']; ?> грн.</span></li>
                            <li class="d-flex justify-content-between">
                                <a href="<?= yii\helpers\Url::to(['site/products']); ?>" class="primary-btn cart-btn">Продолжить покупки</a>
                                <?php if (!empty($basket)): ?>
                                    <a href="<?= yii\helpers\Url::to(['order/checkout']); ?>"
                                    class="primary-btn complete-order">
                                    ОФОРМИТЬ ЗАКАЗ
                                    </a>
                                <?php endif; ?>
                            </li>
                            <li class="d-flex justify-content-between">
                                <a href="<?= yii\helpers\Url::to(['basket/clear']); ?>" class="clear-basket primary-btn cart-btn"><i class="fa-solid fa-trash-can"></i> Очистить корзину</a>
                                <a href="<?= yii\helpers\Url::to(['basket/update']); ?>" class="primary-btn cart-btn">Обновить корзину</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php else: ?>
        <p class="text-center my-5">Ваша корзина пуста</p>

    <?php endif; ?>
    <!-- Shoping Cart Section End -->