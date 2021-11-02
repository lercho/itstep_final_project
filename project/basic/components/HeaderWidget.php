<?php

namespace app\components;

use yii\base\Widget;
use app\models\{Basket, Categories};

class HeaderWidget extends Widget {

    public function run() {
        $basket = (new Basket())->getBasket();
        if (!empty($basket)) {
            $basket_count = count($basket['products']); 
            $basket_amount = $basket['amount'];
        } else {
            $basket_count = 0;
            $basket_amount = 0;
        }
        $categories_arr = Categories::find()->all();           
        $html = \Yii::$app->cache->get('categories');
        if ($html === false) {
            $categories_arr = Categories::find()->all();
            $html = $this->render('header', compact('categories_arr', 'basket_count', 'basket_amount'));
            \Yii::$app->cache->set('categories', $html, 60*60*24);
        }
        return $html;
    }
}