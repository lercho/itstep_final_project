<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Order;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends AdminController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        $queueOrders = new ActiveDataProvider([
            'query' => Order::find()
                        ->where(['status' => 0])
                        ->orderBy(['created' => SORT_ASC]),
            'sort' => false,
                'pagination' => [
                'pageSize' => 3,
                'pageParam' => 'queue',
            ]
        ]);

        $processOrders = new ActiveDataProvider([
            'query' => Order::find()
            ->where(['IN', 'status', [1,2,3]])
            ->orderBy(['updated' => SORT_ASC]),
            'sort' => false,
            'pagination' => [
                'pageSize' => 3,
                'pageParam' => 'process',
            ]
        ]);
           
        return $this->render('index', compact(['queueOrders', 'processOrders']));
    }
}
