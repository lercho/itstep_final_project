<?php
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use app\assets\AppAsset;
use app\models\Categories;

$categories_arr = Categories::find()->all(); 

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode($this->title) ?> | Панель управления</title>
    <?php $this->head() ?>
    </head>
    <body>
      <?php $this->beginBody() ?>
      <header>

          <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="<?= Url::to(['/admin/default/index']) ?>">Главная </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= Url::to(['/admin/order/index']) ?>">Заказы</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= Url::to(['/admin/categories/index']) ?>">Категории</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Товары по категориям</a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="<?= Url::to(['/admin/products']) ?>">Все</a>
                    <?php foreach ($categories_arr as $item):  ?>
                      <a class="dropdown-item" href="<?= Url::to(['/admin/categories/products', 'id' => $item['id']]) ?>"><?=  $item['category_name'] ?></a>
                    <?php endforeach; ?>
                  </div>
                </li>
                
              </ul>
              <div class="navbar-nav navbar-right">
                  <a class="nav-link" href="<?= Url::to(['/admin/auth/logout']) ?>">Выйти</a>
              </div>
            </div>
      </nav>
        </header>
        <div class="container">
          <?= $content; ?>
        </div>

        <?php $this->endBody() ?>
      </body>
   </html>
   <?php $this->endPage() ?>