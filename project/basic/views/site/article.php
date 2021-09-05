 <!-- Product Details Section Begin -->
 <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-9 m-auto">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                        <?= yii\helpers\Html::img('@web/img/blog/'.$article[0]->img, ['alt' => '', 'class' => 'product__details__pic__item--large']) ?>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6 class="text-center"><?= $article[0]->name ?></h6>
                                    <div class="mb-5">
                                        <p class="mb-3"><?= $article[0]->text ?></p>
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