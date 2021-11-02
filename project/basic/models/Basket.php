<?php

namespace app\models;

use yii\base\Model;
use Yii;

class Basket extends Model {

    public function addToBasket($id, $count = 1) {
        $count = (int)$count;
        if ($count < 1) {
            return;
        }
        $id = abs((int)$id);
        $product = Products::findOne($id);
        if (empty($product)) {
            return;
        }
        if ($count > 10) {
            $count = 10;
        }
        $session = Yii::$app->session;
        $session->open();
        if (!$session->has('basket')) {
            $session->set('basket', []);
            $basket = [];
        } else {
            $basket = $session->get('basket');
        }
        if (!isset($basket['products'][$product->id])) { 
            $basket['products'][$product->id]['name'] = $product->prod_name;
            $basket['products'][$product->id]['img'] = $product->img_1;
            $basket['products'][$product->id]['price'] = $product->price;
        } 
        $amount = 0.0;
        foreach ($basket['products'] as $item) {
            $amount = $amount + $item['price'];
        }
        $basket['amount'] = $amount;
        $session->set('basket', $basket);
    }

    public function removeFromBasket($id) {
        $id = abs((int)$id);
        $session = Yii::$app->session;
        $session->open();
        if (!$session->has('basket')) {
            return;
        }
        $basket = $session->get('basket');
        if (!isset($basket['products'][$id])) {
            return;
        }
        unset($basket['products'][$id]);
        if (count($basket['products']) == 0) {
            $session->set('basket', []);
            return;
        }
        $amount = 0.0;
        foreach ($basket['products'] as $item) {
            $amount = $amount + $item['price'];
        }
        $basket['amount'] = $amount;
        $session->set('basket', $basket);
    }

    public function getBasket() {
        $session = Yii::$app->session;
        $session->open();
        if (!$session->has('basket')) {
            $session->set('basket', []);
            return [];
        } else {
            return $session->get('basket');
        }
    }

    public function clearBasket() {
        $session = Yii::$app->session;
        $session->open();
        $session->set('basket', []);
    }
}