<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\{Order, OrderItem, Basket};

class OrderController extends Controller {

   public $defaultAction = 'checkout';

   public function actionCheckout() {
      $session = Yii::$app->session;
      $session->open();
      if (!$session->has('basket') || empty($session->get('basket'))) {
         return $this->goHome();
      }
      $order = new Order();
      if ($order->load(Yii::$app->request->post())) {
         if ( ! $order->validate()) {
            Yii::$app->session->setFlash(
               'checkout-success',
               false
            );
            Yii::$app->session->setFlash(
               'checkout-data',
               [
                  'name' => $order->name,
                  'surname' => $order->surname,
                  'email' => $order->email,
                  'phone' => $order->phone,
                  'city' => $order->city,
                  'delivery_option' => $order->delivery_option,
                  'delivery_department' => $order->delivery_department,
                  'payment_method' => $order->payment_method,
                  'comment' => $order->comment
               ]
            );
            Yii::$app->session->setFlash(
               'checkout-errors',
               $order->getErrors()
            );
         } else {
         
         $basket = new Basket();
         $content = $basket->getBasket();
         $order->amount = $content['amount'];
         $order->insert();
         $order->addItems($content);
         $basket->clearBasket();
         Yii::$app->session->setFlash(
            'checkout-success',
            true
         );
         }
            return $this->refresh();
         }
         $basket = (new Basket())->getBasket();

         return $this->render('checkout', compact('order', 'basket'));
   }
}
