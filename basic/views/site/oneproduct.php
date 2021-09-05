 <!-- Product Details Section Begin -->
 <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            
                        <?= yii\helpers\Html::img('@web/img/products/large/'.$product[0]->img_1, ['alt' => '', 'class' => 'product__details__pic__item--large']) ?>
                        
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <?= yii\helpers\Html::img('@web/img/products/thumb/'.$product[0]->img_1, ['alt' => '', 'data-imgbigurl' => Yii::getAlias('@web/img/products/large/').$product[0]->img_1]) ?>  
                            <?= yii\helpers\Html::img('@web/img/products/thumb/'.$product[0]->img_2, ['alt' => '', 'data-imgbigurl' => Yii::getAlias('@web/img/products/large/').$product[0]->img_2]) ?>  
                            <?= yii\helpers\Html::img('@web/img/products/thumb/'.$product[0]->img_3, ['alt' => '', 'data-imgbigurl' => Yii::getAlias('@web/img/products/large/').$product[0]->img_3]) ?>  
                            <?= yii\helpers\Html::img('@web/img/products/thumb/'.$product[0]->img_4, ['alt' => '', 'data-imgbigurl' => Yii::getAlias('@web/img/products/large/').$product[0]->img_4]) ?>  
                            
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?= $product[0]->prod_name ?></h3>
                        
                        <div class="product__details__price"><?= $product[0]->price ?> грн.</div>
                        <div class="mb-5">
                            <p class="mb-3"><?= $product[0]->description_short ?></p>
                        </div>

                        <div>
                            <form method="post" 
                                class="add-to-basket"
                                action="<?= yii\helpers\Url::to(['basket/add']); ?>">
                                <input type="hidden" name="id"
                                value="<?= $product[0]->id; ?>">
                                <?=
                                    yii\helpers\Html::hiddenInput(
                                        Yii::$app->request->csrfParam,
                                        Yii::$app->request->csrfToken
                                    );
                                ?>
                                <button class="primary-btn" type="submit">В КОРЗИНУ</button>
                            </form>
                        </div>
                        <ul>
                            <li><b>Автор картины</b> <span><?= $product[0]->author ?></span></li>
                            <li><b>Материал</b> <span><?= $product[0]->material ?></span></li>
                            <li><b>Размер</b> <span><?= $product[0]->width ?>см * <?= $product[0]->height ?>см</span></li>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6 class="text-center">Описание</h6>
                                    <div class="mb-5">
                                        <p class="mb-3"><?= $product[0]->description_full ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->