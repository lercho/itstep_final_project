   <!-- Page Preloder -->
   <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="<?= \yii\helpers\Url::home() ?>"> <?= yii\helpers\Html::img('@web/img/logo.png', ['alt' => 'paramonova']) ?> </a>

        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="<?= yii\helpers\Url::to(['basket/index']); ?>"><i class="fa fa-shopping-bag"></i> 
                    <?php if ($basket_count != 0): ?>
                        <span id="cart"><?= $basket_count ?></span>
                    <?php endif; ?>
                </a></li>
            </ul>
        </div>
    
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="<?= \yii\helpers\Url::home() ?>">Главная</a></li>
                <li><a href="<?= \yii\helpers\Url::to(['site/products']) ?>">Магазин</a></li>
                <li><a href="<?= \yii\helpers\Url::to(['site/blog']) ?>">Блог</a></li>
                <li><a href="<?= \yii\helpers\Url::to(['site/contact']) ?>">Контакты</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i>hello@paramonova.tk</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i>hello@paramonova.tk</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="<?= \yii\helpers\Url::home() ?>"><?= yii\helpers\Html::img('@web/img/logo.png', ['alt' => 'paramonova']) ?></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="<?= \yii\helpers\Url::home() ?>">Главная</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['site/products']) ?>">Магазин</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['site/blog']) ?>">Блог</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['site/contact']) ?>">Контакты</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="<?= yii\helpers\Url::to(['basket/index']); ?>"><i class="fa fa-shopping-bag"></i>
                                <?php if ($basket_count != 0): ?>
                                    <span id="cart"><?= $basket_count ?></span>
                                <?php endif; ?>

                            </a></li>
                        </ul>
                        <div class="header__cart__price">Сумма заказа: <span><?= $basket_amount ?> грн.</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

      <!-- Hero Section Begin -->
      <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Все категории</span>
                        </div>
                        <ul>

                            <?php foreach ($categories_arr as $record): ?>
                                
                                <li><a href="<?= \yii\helpers\Url::to(['site/categories', 'id' => $record['id']]) ?>"><?= $record['category_name'] ?></a></li>
                            <?php endforeach;?>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form method="get" action="<?= \yii\helpers\Url::to(['site/search']); ?>">
                                
                                <input type="text" name="query">
                                <button type="submit" class="site-btn">ПОИСК</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+38 066 547 4534</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->