 <!-- Blog Section Begin -->
 <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Категории</h4>
                            <ul>
                                <li><a href="#">Все</a></li>
                                <?php foreach ($blog_categories_arr as $record): ?>
                                    <li><a href="<?= \yii\helpers\Url::to(['site/article', 'id' => $record['id']]) ?>"><?= $record['name'] ?></a></li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                       
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="row">
                        <?php foreach ($articles_arr as $record): ?>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="blog__item">
                                    <div class="blog__item__pic">
                                        <?= yii\helpers\Html::img('@web/img/blog/'.$record['img'], ['alt' => '']) ?>
                                    </div>
                                    <div class="blog__item__text">
                                        <h5><a href="<?= \yii\helpers\Url::to(['site/article', 'id' => $record['id']]) ?>"><?= $record['name'] ?></a></h5>
                                        <a href="<?= \yii\helpers\Url::to(['site/article', 'id' => $record['id']]) ?>" class="blog__btn">ЧИТАТЬ<span class="arrow_right"></span></a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->