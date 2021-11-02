<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Basket;

class BasketController extends Controller {

    public function actionIndex() {
    $basket = (new Basket())->getBasket();
    return $this->render('index', compact('basket'));
    }

    public function actionAdd() {
        $basket = new Basket();
        $data = Yii::$app->request->post();

        if (!isset($data['count'])) {
            $data['count'] = 1;
        }
        $basket->addToBasket($data['id'], $data['count']);
        return $this->redirect(['basket/index']);

        if (Yii::$app->request->isAjax) { 
            $content = $basket->getBasket();
            return print_r($content, true);
        } else { 
            return $this->redirect(['basket/index']);
        }
    }

    public function actionRemove($id) {
        $basket = new Basket();
        $basket->removeFromBasket($id);
        if (Yii::$app->request->isAjax) { 
        $this->layout = false;
        $content = $basket->getBasket();
        return $this->render('index', ['basket' => $content]);
        } else { 
        return $this->redirect(['basket/index']);
        }
    }

    public function actionClear() {
        $basket = new Basket();
        $basket->clearBasket();
        if (Yii::$app->request->isAjax) {
            $this->layout = false;
            $content = $basket->getBasket();
            return $this->render('index', ['basket' => $content]);
        } else { 
            return $this->redirect(['basket/index']);
        }
    }

    public function actionUpdate() {
        return $this->redirect(['basket/index']);
    }
}

