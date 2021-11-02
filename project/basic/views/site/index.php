<?php

$this->title = 'PARAMONOVA';

?>

   <!-- Hero Section Begin -->

    <section class="hero mb-5">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-12">
                    
                    <div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
                        <div class="hero__text">
                            <span>Ручная работа</span>
                            <h2 class="my-3">Вышитые картины</h2>
                            <a href="<?= \yii\helpers\Url::to(['site/products']) ?>" class="primary-btn mt-5">В МАГАЗИН</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Категории</h2>
                    </div>
                </div>
                <div class="categories__slider owl-carousel">
                    <?php foreach ($categories_arr as $record): ?>
                        <div class="col-lg-3 ">
                            <div class="categories__item" style="background-image: url('<?= Yii::getAlias('@web/img/categories/').$record['img'];?>');">
                                <h5><a href="<?= \yii\helpers\Url::to(['site/categories', 'id' => $record['id']]) ?>"><?= $record['category_name'] ?></a></h5>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Новинки</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <?php foreach ($new_products as $record): ?>

                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                    <div class="featured__item__pic product__item__pic set-bg" data-setbg="<?= Yii::getAlias('@web/img/products/medium/').$record['img_1'];?>" style="background-image: url('<?= Yii::getAlias('@web/img/products/medium/').$record['img_1'];?>');">
                            <ul class="featured__item__pic__hover product__item__pic__hover">
                                <li><a href="<?= \yii\helpers\Url::to(['site/oneproduct', 'id' => $record['id']]) ?>"><i class="fa fa-eye"></i></a></li>
                                <li>
                                    <?php if (isset($basket['products'][$record['id']])): ?>
                                        <a class="disabled"><i class="fa fa-check text-white"></i></a>                    
                                    <?php else: ?>
                                        <div>
                                            <form method="post" 
                                                class="add-to-basket"
                                                action="<?= yii\helpers\Url::to(['basket/add']); ?>">
                                                <input type="hidden" name="id" value="<?= $record['id']; ?>">
                                                <?=
                                                    yii\helpers\Html::hiddenInput(
                                                        Yii::$app->request->csrfParam,
                                                        Yii::$app->request->csrfToken
                                                    );
                                                ?>
                                                <button type="submit">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </button>
                                            </form>
                                        </div>   
                                    <?php endif; ?>                                    
                                </li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="<?= \yii\helpers\Url::to(['site/oneproduct', 'id' => $record['id']]) ?>"><?= $record['prod_name'] ?></a></h6>
                            <h5><?= $record['price'] ?> грн.</h5>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->


    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>Блог</h2>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php foreach ($blog_articles_arr as $record): ?>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <?= yii\helpers\Html::img('@web/img/blog/'.$record['img'], ['alt' => '']) ?>
                        </div>
                        <div class="blog__item__text">
                            <h5><a href="<?= \yii\helpers\Url::to(['site/article', 'id' => $record['id']]) ?>"><?= $record['name'] ?></a></h5>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

    