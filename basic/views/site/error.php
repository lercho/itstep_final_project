<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = 'Страница не найдена';
?>
<div class="site-error">

    <h3 class="text-center"><?= Html::encode($this->title) ?></h3>
    <p class="text-center my-5">Упс! Кажется, такой страницы не существует</p>
    <a href="<?= \yii\helpers\Url::home() ?>" class="nav-link text-center">На главную</a>

</div>

