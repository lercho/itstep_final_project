<!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__about__logo">
                        <a href="<?= \yii\helpers\Url::home() ?>"><?= yii\helpers\Html::img('@web/img/logo.png', ['alt' => 'paramonova']) ?></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 ">
                    <div class="footer__widget">
                        <h6>Контакты</h6>
                        <ul class="w-100">
                            <li class="w-100"><a href="">Телефон: +38 066 547 4534</a></li>
                            <li class="w-100"><a href="#">Имейл: hello@paramonova.tk</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 col-sm-12 ">
                    <div class="footer__widget">
                        <h6>Полезные ссылки</h6>
                        <ul>
                            <li><a href="<?= \yii\helpers\Url::to(['site/about']) ?>">Обо мне</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['site/contact']) ?>">Контакты</a></li>
                        </ul>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <p class="text-center">
                            Копирайт &copy;<script>document.write(new Date().getFullYear());</script> Все права защищены</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->