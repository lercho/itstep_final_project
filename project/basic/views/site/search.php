<?php

use yii\widgets\LinkPager;

?>

<!-- Product Section Begin -->
<?php if (!empty($products_arr)): ?>

<section class="product spad">
       <div class="container">
           <div class="row">
               <div class="col-lg-12 col-md-12">
                   <div class="filter__item">
                       <div class="row">
                           <div class="col-lg-4 col-md-5">
                               <div class="filter__sort">
                                   <span id="testovy-id">Сортировать</span>
                                   <select>
                                       <option value="default">По умолчанию</option>
                                       <option value="date">По дате</option>
                                       <option value="cheap">Сначала дешевле</option>
                                       <option value="expensive">Сначала дороже</option>
                                   </select>
                               </div>
                           </div>
                           <div class="col-lg-4 col-md-4">
                               <div class="filter__found">
                                   <h6 id="testik">По вашему запросу найдено товаров: <span><?= $products_count ?></span></h6>
                               </div>
                           </div>
                       </div>
                   </div>
                   <?php if (!empty($products_arr)): ?>
                   <div class="row">
                       <?php foreach ($products_arr as $record): ?>
                           <div class="col-lg-3 col-md-4 col-sm-6">
                           <div class="product__item">                   
                               <div class="product__item__pic set-bg" data-setbg="<?= Yii::getAlias('@web/img/products/medium/').$record['img_1'];?>" style="background-image: url('<?= Yii::getAlias('@web/img/products/medium/').$record['img_1'];?>');">
                                   <ul class="product__item__pic__hover">
                                       <li><a href="<?= \yii\helpers\Url::to(['site/oneproduct', 'id' => $record['id']]) ?>"><i class="fa fa-eye"></i></a></li>

                                       <li>
                                           <div>
                                           <form method="post" 
                                               class="add-to-basket"
                                               action="<?= yii\helpers\Url::to(['basket/add']); ?>">
                                               <input type="hidden" name="id"
                                               value="<?= $record['id']; ?>">
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
                                       </li>

                                   </ul>
                               </div>
                               <div class="product__item__text">
                                   <h6><a href="<?= \yii\helpers\Url::to(['site/oneproduct', 'id' => $record['id']]) ?>"><?= $record['prod_name'] ?></a></h6>
                                   <h5><?= $record['price'] ?> грн.</h5>
                               </div>
                           </div>
                       </div>
                       <?php endforeach;?>                    
                   </div>
                   <div class="pagination justify-content-center"> 
                       <?= LinkPager::widget([
                           'pagination' => $pages,
                           'hideOnSinglePage' => true,
                       ]); ?>
                   </div>
                   <?php else: ?>
                   <p class="text-center">Нет товаров в этой категории.</p>
                   <?php endif; ?>
               </div>
           </div>
       </div>
   </section>

    <?php else: ?>
        <p>По вашему запросу ничего не найдено.</p>
    <?php endif; ?>

   <!-- Product Section End -->